<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\UshResource\Pages;
use App\Models\Ush;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class UshResource extends Resource
{
    protected static ?string $model = Ush::class;
    protected static ?string $modelLabel = 'Data User Healtie';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Forms\Components\TextInput::make('alamat'),
                // long text
                Forms\Components\Textarea::make('alamat'),
                Forms\Components\DatePicker::make('tanggal_lahir'),
                // Forms\Components\TextInput::make('tujuan'), // select
                Forms\Components\Select::make('tujuan')
                    ->options([
                        'Kurangi Berat Badan' => 'Kurangi Berat Badan',
                        'Tetapkan Berat Badan' => 'Tetapkan Berat Badan',
                        'Tingkatkan Berat Badan' => 'Tingkatkan Berat Badan',
                    ]),
                // Forms\Components\TextInput::make('profilepaat'), img
                Forms\Components\FileUpload::make('profilepaat')
                    ->image()
                    ->avatar(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // id
                Tables\Columns\TextColumn::make('id')->searchable(),
                Tables\Columns\TextColumn::make('alamat')->searchable(),
                Tables\Columns\TextColumn::make('tujuan')->searchable(),
                // Tables\Columns\TextColumn::make('profilepaat')->searchable(), //img
                Tables\Columns\ImageColumn::make('profilepaat'),
            ])
            ->filters([

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUshes::route('/'),
            'create' => Pages\CreateUsh::route('/create'),
            'edit' => Pages\EditUsh::route('/{record}/edit'),
        ];
    }
}
