<?php

namespace App\Filament\Resources\ProduksiRotaries\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Components\Wizard\Step;
use Filament\Schemas\Components\Section;
use Illuminate\Support\HtmlString;

class ProduksiRotaryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Wizard::make([
                // STEP 1: PRODUKSI UTAMA
                Step::make('Data Produksi')
                    ->schema([
                        Section::make('Informasi Produksi')
                            ->columns(2)
                            ->schema([
                                Select::make('id_mesin')
                                    ->label('Mesin')
                                    ->relationship('mesin', 'nama_mesin') // pastikan relasi & kolom di model Mesin
                                    ->required(),

                                DatePicker::make('tgl_produksi')
                                    ->label('Tanggal Produksi')
                                    ->required(),

                                Textarea::make('kendala')
                                    ->label('Kendala')
                                    ->columnSpanFull(),
                            ]),
                    ]),

                // STEP 2: DETAIL LAHAN (detail_lahan_rotary)
                Step::make('Detail Lahan')
                    ->schema([
                        Section::make('Data Lahan')
                            ->schema([
                                Repeater::make('detail_lahan_rotary') // nama state; nanti disesuaikan saat penyimpanan
                                    ->relationship('detailLahans')
                                    ->label('Detail Lahan')
                                    ->schema([
                                        Select::make('id_lahan')

                                            ->label('Lahan')
                                            ->relationship('lahan', 'nama_lahan')
                                            ->required(),

                                        TextInput::make('jumlah_batang')
                                            ->label('Jumlah Batang')
                                            ->numeric()
                                            ->required(),
                                    ])
                                    ->columns(1),
                            ]),
                    ]),

                // STEP 3: DETAIL PEGAWAI (detail_pegawai_rotary)
                Step::make('Detail Pegawai')
                    ->schema([
                        Section::make('Pegawai Produksi')
                            ->schema([
                                Repeater::make('detail_pegawai_rotary')
                                    ->relationship('detailPegawais')
                                    ->label('Pegawai')
                                    ->schema([
                                        Select::make('id_pegawai')
                                            ->label('Pegawai')
                                            ->relationship('pegawai', 'nama_pegawai')
                                            ->required(),

                                        TextInput::make('id_role')
                                            ->label('ID Role')
                                            ->numeric()
                                            ->required(),

                                        TimePicker::make('jam_masuk')
                                            ->label('Jam Masuk'),

                                        TimePicker::make('jam_pulang')
                                            ->label('Jam Pulang'),
                                    ])
                                    ->columns(1),
                            ]),
                    ]),

                // STEP 4: HASIL PALET (detail_hasil_palet_rotary)
                Step::make('Hasil Palet')
                    ->schema([
                        Section::make('Hasil per Ukuran & KW')
                            ->schema([
                                Repeater::make('detail_hasil_palet_rotary')
                                    ->label('Hasil Palet')
                                    ->relationship('detailHasilPalets')
                                    ->schema([
                                        // timestamp_laporan (boleh gunakan Date + Time, atau DateTimePicker jika tersedia)
                                        DatePicker::make('timestamp_laporan_date')
                                            ->label('Tanggal Laporan')
                                            ->required(),

                                        TimePicker::make('timestamp_laporan_time')
                                            ->label('Waktu Laporan')
                                            ->required(),

                                        Select::make('id_ukuran')
                                            ->label('Ukuran')
                                            ->relationship('ukuran', 'id_ukuran') // pastikan kolom display di tabel ukurans
                                            ->required(),

                                        TextInput::make('id_kw')
                                            ->label('KW')
                                            ->numeric()
                                            ->required(),

                                        TextInput::make('total')
                                            ->label('Total')
                                            ->numeric()
                                            ->required(),
                                    ])
                                    ->columns(1),
                            ]),
                    ]),
            ])
                ->columnSpanFull()
                ->skippable(false)
                ->persistStepInQueryString()
                // tombol submit hanya dirender di step terakhir
                ->submitAction(new HtmlString('<x-filament::button type="submit">Simpan Produksi</x-filament::button>')),
        ]);
    }
}
