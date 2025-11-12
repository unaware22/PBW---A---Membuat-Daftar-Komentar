<?php

namespace App\Filament\Resources;

use App\Models\Komentar;
use Filament\Tables;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\DeleteAction;
use App\Filament\Resources\KomentarResource\Pages;

class KomentarResource extends Resource
{
    protected static ?string $model = Komentar::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-ellipsis';
    protected static ?string $navigationGroup = 'Manajemen Berita';
    protected static ?string $pluralLabel = 'Komentar';
    protected static ?string $modelLabel = 'Komentar';

    public static function form(Form $form): Form
    {
        // Form tidak terlalu diperlukan, karena kamu hanya ingin menampilkan & hapus
        return $form->schema([]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('news.judul')
                    ->label('Judul Berita')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('nama')
                    ->label('Nama Komentator')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('isi')
                    ->label('Isi Komentar')
                    ->limit(80)
                    ->wrap()
                    ->searchable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([])
            ->actions([
                DeleteAction::make()
                    ->label('Hapus')
                    ->color('danger')
                    ->requiresConfirmation(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Hapus Terpilih'),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKomentars::route('/'),
        ];
    }
}
