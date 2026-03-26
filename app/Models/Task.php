<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'user_id',
        'titulo',
        'descricao',
        'prioridade',
        'status',
        'data_limite'
    ];

    public const STATUS_COLOR = [
        'pendente' => 'bg-yellow-400',
        'concluida' => 'bg-green-400',
        'cancelada' => 'bg-red-400',
        ];

    public function getStatusColor() {
        return self::STATUS_COLOR[$this->status];
    }

    public const PRIORIDADES = [
        'baixa' => 'Baixa',
        'media' => 'Média',
        'alta' => 'Alta',
    ];
}
