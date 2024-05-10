<?php

namespace App\Filament\Admin\Resources\QuizResource\Pages;

use App\Filament\Admin\Resources\QuizResource;
use Filament\Resources\Pages\CreateRecord;

class CreateQuiz extends CreateRecord
{
    protected static string $resource = QuizResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
