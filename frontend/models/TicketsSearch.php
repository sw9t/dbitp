<?php

namespace frontend\models;

use common\models\User;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\db\Expression;

class TicketsSearch extends Tickets
{


    public function rules()
    {
        return [
            [['id', 'status_id', 'declarer_id', 'executor_id', 'is_deleted'], 'integer'],
            [['subject', 'text', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params, $type)
    {
        $query = Tickets::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query->joinWith(StatusTicket::tableName()),
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'tickets.id' => $this->id,
            'status_id' => $this->status_id,
            'declarer_id' => $this->declarer_id,
//            'executor_id' => $this->executor_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'tickets.is_deleted' => 0,
        ]);

        switch ($type) {
            case 'my':
            default:
                $query->andFilterWhere([
                    'declarer_id' => Yii::$app->user->id,
                ]);
                $query->orderBy('status_ticket.is_final ASC , tickets.id DESC');
                break;
            case 'free' :
                $query->andFilterWhere(['IS', 'executor_id', (new Expression('Null'))]);
                break;
            case 'processing' :
                if (!Yii::$app->user->can('admin')) {
                    $query->andFilterWhere([
                        'status_ticket.is_final' => 0,
                        'executor_id' => Yii::$app->user->id,
                    ]);
                } else {
                    $query->andFilterWhere([
                        'status_ticket.is_final' => 0,
                    ]);
                    $query->andFilterWhere(['not', ['executor_id' => null]]);
                }
                $query->orderBy('tickets.id DESC');
                break;
            case 'completed':
                if (!Yii::$app->user->can('admin') && Yii::$app->user->can('declarer')) {
                    $query->andFilterWhere([
                        'status_ticket.is_final' => 1,
                        'declarer_id' => Yii::$app->user->id,
                    ]);
                }
                if (!Yii::$app->user->can('admin') && Yii::$app->user->can('executor')) {
                    $query->andFilterWhere([
                        'status_ticket.is_final' => 1,
                        'executor_id' => Yii::$app->user->id,
                    ]);
                }
                if (Yii::$app->user->can('admin')) {
                    $query->andFilterWhere([
                        'status_ticket.is_final' => 1,
                    ]);
                }
                $query->orderBy('tickets.id DESC');
                break;

        }


        $query->andFilterWhere(['like', 'subject', $this->subject])
            ->andFilterWhere(['like', 'text', $this->text]);

        return $dataProvider;
    }
}
