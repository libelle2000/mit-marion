<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables\Partial;

use MitMarion\TemplateVariables\TemplateVariables;
use Shared\ValueObject\Link\Href;

class StoryFlyoutTemplateVariables implements TemplateVariables
{
    protected const STORY_MAP = [
        self::ZERO_BASED_INDEX_VOM_REGEN_ERFRISCHEN_LASSEN => [
            self::HREF => '/vom-regen-erfrischen-lassen/',
            self::CAPTION => 'vom Regen erfrischen lassen',
        ],
        self::ZERO_BASED_INDEX_DEN_RUECKEN_VERRUECKEN => [
            self::HREF => '/den-rücken-verrücken/',
            self::CAPTION => 'den Rücken verrücken',
        ],
        self::ZERO_BASED_INDEX_DIE_FAZIEN_FETZEN => [
            self::HREF => '/die-fazien-fetzen/',
            self::CAPTION => 'die Faszien fetzen',
        ],
        self::ZERO_BASED_INDEX_DEN_ALLTAG_FUER_EINE_STUNDE_VERGESSEN => [
            self::HREF => '/den-alltag-für-eine-stunde-vergessen/',
            self::CAPTION => 'den Alltag für eine Stunde vergessen',
        ],
        self::ZERO_BASED_INDEX_BAEUME_IN_BEWEGUNG_BRINGEN => [
            self::HREF => '/bäume-in-bewegung-bringen/',
            self::CAPTION => 'Bäume in Bewegung bringen',
        ],
        self::ZERO_BASED_INDEX_DIE_MUEDEN_KNOCHEN_IN_SCHWUNG_BRINGEN => [
            self::HREF => '/die-müden-knochen-in-schwung-bringen/',
            self::CAPTION => 'die müden Knochen in Schwung bringen',
        ],
        self::ZERO_BASED_INDEX_DIE_ORANGEN_HAEUTEN => [
            self::HREF => '/die-orangen-häuten/',
            self::CAPTION => 'die Orangen häuten',
        ],
        self::ZERO_BASED_INDEX_KOERPER_UND_SEELE_IN_EINKLANG_BRINGEN => [
            self::HREF => '/körper-und-seele-in-einklang-bringen/',
            self::CAPTION => 'Körper und Seele in Einklang bringen',
        ],
        self::ZERO_BASED_INDEX_MEINE_BALANCE_FINDEN => [
            self::HREF => '/meine-balance-finden/',
            self::CAPTION => 'meine Balance finden',
        ],
        self::ZERO_BASED_INDEX_MIR_DEN_KOPF_VERDREHEN => [
            self::HREF => '/mir-den-kopf-verdrehen/',
            self::CAPTION => 'mir den Kopf verdrehen',
        ],
        self::ZERO_BASED_INDEX_UEBER_STOCK_UND_STEIN => [
            self::HREF => '/über-stock-und-stein/',
            self::CAPTION => 'über Stock und Stein',
        ],
        self::ZERO_BASED_INDEX_IM_EINZELTRAINING => [
            self::HREF => '/im-einzeltraining/',
            self::CAPTION => 'im Einzeltraining',
        ],
    ];

    private const ZERO_BASED_INDEX_VOM_REGEN_ERFRISCHEN_LASSEN = 0;
    private const ZERO_BASED_INDEX_DEN_RUECKEN_VERRUECKEN = 1;
    private const ZERO_BASED_INDEX_DIE_FAZIEN_FETZEN = 2;
    private const ZERO_BASED_INDEX_DEN_ALLTAG_FUER_EINE_STUNDE_VERGESSEN = 3;
    private const ZERO_BASED_INDEX_BAEUME_IN_BEWEGUNG_BRINGEN = 4;
    private const ZERO_BASED_INDEX_DIE_MUEDEN_KNOCHEN_IN_SCHWUNG_BRINGEN = 5;
    private const ZERO_BASED_INDEX_DIE_ORANGEN_HAEUTEN = 6;
    private const ZERO_BASED_INDEX_KOERPER_UND_SEELE_IN_EINKLANG_BRINGEN = 7;
    private const ZERO_BASED_INDEX_MEINE_BALANCE_FINDEN = 8;
    private const ZERO_BASED_INDEX_MIR_DEN_KOPF_VERDREHEN = 9;
    private const ZERO_BASED_INDEX_UEBER_STOCK_UND_STEIN = 10;
    private const ZERO_BASED_INDEX_IM_EINZELTRAINING = 11;

    public function asAssocArray(): array
    {
        return [
            'storyNav' => [
                'currentTitle' => 'Entdecke die Erfolgstories',
                'stories' => self::STORY_MAP,
            ],
        ];
    }

    public function getLinkHrefForVomRegenErfrischenLassen(): Href
    {
        return $this->buildLinkHrefByZeroBasedIndex(self::ZERO_BASED_INDEX_VOM_REGEN_ERFRISCHEN_LASSEN);
    }

    public function getLinkHrefForDenRueckenVerruecken(): Href
    {
        return $this->buildLinkHrefByZeroBasedIndex(self::ZERO_BASED_INDEX_DEN_RUECKEN_VERRUECKEN);
    }

    public function getLinkHrefForDieFazienFetzen(): Href
    {
        return $this->buildLinkHrefByZeroBasedIndex(self::ZERO_BASED_INDEX_DIE_FAZIEN_FETZEN);
    }

    public function getLinkHrefForDenAlltagFuerEineStundeVergessen(): Href
    {
        return $this->buildLinkHrefByZeroBasedIndex(self::ZERO_BASED_INDEX_DEN_ALLTAG_FUER_EINE_STUNDE_VERGESSEN);
    }

    public function getLinkHrefForBaeumeInBewegungBringen(): Href
    {
        return $this->buildLinkHrefByZeroBasedIndex(self::ZERO_BASED_INDEX_BAEUME_IN_BEWEGUNG_BRINGEN);
    }

    public function getLinkHrefForDieMuedenKnochenInSchwungBringen(): Href
    {
        return $this->buildLinkHrefByZeroBasedIndex(self::ZERO_BASED_INDEX_DIE_MUEDEN_KNOCHEN_IN_SCHWUNG_BRINGEN);
    }

    public function getLinkHrefForDieOrangenHaeuten(): Href
    {
        return $this->buildLinkHrefByZeroBasedIndex(self::ZERO_BASED_INDEX_DIE_ORANGEN_HAEUTEN);
    }

    public function getLinkHrefForKoerperUndSeeleInEinklangBringen(): Href
    {
        return $this->buildLinkHrefByZeroBasedIndex(self::ZERO_BASED_INDEX_KOERPER_UND_SEELE_IN_EINKLANG_BRINGEN);
    }

    public function getLinkHrefForMeineBalanceFinden(): Href
    {
        return $this->buildLinkHrefByZeroBasedIndex(self::ZERO_BASED_INDEX_MEINE_BALANCE_FINDEN);
    }

    public function getLinkHrefForMirDenKopfVerdrehen(): Href
    {
        return $this->buildLinkHrefByZeroBasedIndex(self::ZERO_BASED_INDEX_MIR_DEN_KOPF_VERDREHEN);
    }

    public function getLinkHrefForUeberStockUndStein(): Href
    {
        return $this->buildLinkHrefByZeroBasedIndex(self::ZERO_BASED_INDEX_UEBER_STOCK_UND_STEIN);
    }

    public function getLinkHrefForImEinzeltraining(): Href
    {
        return $this->buildLinkHrefByZeroBasedIndex(self::ZERO_BASED_INDEX_IM_EINZELTRAINING);
    }

    protected function buildLinkHrefByZeroBasedIndex(int $zeroBasedIndex): Href
    {
        return new Href(self::STORY_MAP[$zeroBasedIndex][self::HREF]);
    }
}
