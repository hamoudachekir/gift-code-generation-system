<?php declare(strict_types=1);

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;


/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
enum QuotaPer: string implements HasColor, HasIcon, HasLabel
{

    const Illimité = '0';
    const Jour = '1';
    const Semaine = '7';
    const Mois = '30';
    const deuxMois = '60';
    const troisMois = '90';
    const quatreMois = '120';
    const cinqMois = '150';
    const sixMois = '180';
    const An = '365';
    const deuxAns = '740';


    public function getLabel(): string
    {
        return match ($this) {
            self::Illimité       => 'Illimité',
            self::Jour           => 'Jour',
            self::Semaine        => 'Semaine',
            self::Mois           => 'Mois',
            self::deuxMois       => 'deuxMois',
            self::troisMois      => 'troisMois',
            self::quatreMois     => 'quatreMois',
            self::cinqMois       => 'cinqMois',
            self::sixMois        => 'sixMois',
            self::An             => 'An',
            self::deuxAns        => 'deuxAns',
        };
    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::Illimité               => 'info',
            self::Jour                   => 'warning',
            self::Semaine, self::Mois    => 'success',
            self::deuxMois               => 'danger',
            self::troisMois              => 'danger',
            self::quatreMois             => 'danger',
            self::cinqMois               => 'danger',
            self::sixMois                => 'danger',
            self::An                     => 'danger',
            self::deuxAns                => 'danger',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::Illimité               => 'heroicon-m-sparkles',
            self::Jour                   => 'heroicon-m-arrow-path',
            self::Semaine                => 'heroicon-m-truck',
            self::Mois                   => 'heroicon-m-check-badge',
            self::deuxMois               => 'heroicon-m-x-circle',
            self::troisMois              => 'heroicon-m-sparkles',
            self::quatreMois             => 'heroicon-m-arrow-path',
            self::cinqMois               => 'heroicon-m-truck',
            self::sixMois                => 'heroicon-m-check-badge',
            self::An                     => 'heroicon-m-sparkles',
            self::deuxAns                => 'heroicon-m-arrow-path',

        };
    }

}