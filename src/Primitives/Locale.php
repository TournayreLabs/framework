<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives;

enum Locale: string
{
    /** @api */
    case AF_ZA = 'af_ZA';

    /** @api */
    case AM_ET = 'am_ET';

    /** @api */
    case AR_AE = 'ar_AE';

    /** @api */
    case AR_BH = 'ar_BH';

    /** @api */
    case AR_DZ = 'ar_DZ';

    /** @api */
    case AR_EG = 'ar_EG';

    /** @api */
    case AR_IQ = 'ar_IQ';

    /** @api */
    case AR_JO = 'ar_JO';

    /** @api */
    case AR_KW = 'ar_KW';

    /** @api */
    case AR_LB = 'ar_LB';

    /** @api */
    case AR_LY = 'ar_LY';

    /** @api */
    case AR_MA = 'ar_MA';

    /** @api */
    case AR_OM = 'ar_OM';

    /** @api */
    case AR_QA = 'ar_QA';

    /** @api */
    case AR_SA = 'ar_SA';

    /** @api */
    case AR_SD = 'ar_SD';

    /** @api */
    case AR_SY = 'ar_SY';

    /** @api */
    case AR_TN = 'ar_TN';

    /** @api */
    case AR_YE = 'ar_YE';

    /** @api */
    case BE_BY = 'be_BY';

    /** @api */
    case BG_BG = 'bg_BG';

    /** @api */
    case BN_BD = 'bn_BD';

    /** @api */
    case BN_IN = 'bn_IN';

    /** @api */
    case CA_ES = 'ca_ES';

    /** @api */
    case CS_CZ = 'cs_CZ';

    /** @api */
    case CY_GB = 'cy_GB';

    /** @api */
    case DA_DK = 'da_DK';

    /** @api */
    case DE_AT = 'de_AT';

    /** @api */
    case DE_BE = 'de_BE';

    /** @api */
    case DE_CH = 'de_CH';

    /** @api */
    case DE_DE = 'de_DE';

    /** @api */
    case DE_LI = 'de_LI';

    /** @api */
    case DE_LU = 'de_LU';

    /** @api */
    case EL_CY = 'el_CY';

    /** @api */
    case EL_GR = 'el_GR';

    /** @api */
    case EN_AU = 'en_AU';

    /** @api */
    case EN_BW = 'en_BW';

    /** @api */
    case EN_CA = 'en_CA';

    /** @api */
    case EN_GB = 'en_GB';

    /** @api */
    case EN_HK = 'en_HK';

    /** @api */
    case EN_IE = 'en_IE';

    /** @api */
    case EN_IN = 'en_IN';

    /** @api */
    case EN_JM = 'en_JM';

    /** @api */
    case EN_MH = 'en_MH';

    /** @api */
    case EN_MT = 'en_MT';

    /** @api */
    case EN_NA = 'en_NA';

    /** @api */
    case EN_NZ = 'en_NZ';

    /** @api */
    case EN_PH = 'en_PH';

    /** @api */
    case EN_PK = 'en_PK';

    /** @api */
    case EN_SG = 'en_SG';

    /** @api */
    case EN_TT = 'en_TT';

    /** @api */
    case EN_US = 'en_US';

    /** @api */
    case EN_ZA = 'en_ZA';

    /** @api */
    case EN_ZW = 'en_ZW';

    /** @api */
    case ES_AR = 'es_AR';

    /** @api */
    case ES_BO = 'es_BO';

    /** @api */
    case ES_CL = 'es_CL';

    /** @api */
    case ES_CO = 'es_CO';

    /** @api */
    case ES_CR = 'es_CR';

    /** @api */
    case ES_DO = 'es_DO';

    /** @api */
    case ES_EC = 'es_EC';

    /** @api */
    case ES_ES = 'es_ES';

    /** @api */
    case ES_GT = 'es_GT';

    /** @api */
    case ES_HN = 'es_HN';

    /** @api */
    case ES_MX = 'es_MX';

    /** @api */
    case ES_NI = 'es_NI';

    /** @api */
    case ES_PA = 'es_PA';

    /** @api */
    case ES_PE = 'es_PE';

    /** @api */
    case ES_PR = 'es_PR';

    /** @api */
    case ES_PY = 'es_PY';

    /** @api */
    case ES_SV = 'es_SV';

    /** @api */
    case ES_US = 'es_US';

    /** @api */
    case ES_UY = 'es_UY';

    /** @api */
    case ES_VE = 'es_VE';

    /** @api */
    case ET_EE = 'et_EE';

    /** @api */
    case EU_ES = 'eu_ES';

    /** @api */
    case FA_IR = 'fa_IR';

    /** @api */
    case FI_FI = 'fi_FI';

    /** @api */
    case FO_FO = 'fo_FO';

    /** @api */
    case FR_BE = 'fr_BE';

    /** @api */
    case FR_CA = 'fr_CA';

    /** @api */
    case FR_CH = 'fr_CH';

    /** @api */
    case FR_FR = 'fr_FR';

    /** @api */
    case FR_LU = 'fr_LU';

    /** @api */
    case GA_IE = 'ga_IE';

    /** @api */
    case GL_ES = 'gl_ES';

    /** @api */
    case HE_IL = 'he_IL';

    /** @api */
    case HI_IN = 'hi_IN';

    /** @api */
    case HR_HR = 'hr_HR';

    /** @api */
    case HU_HU = 'hu_HU';

    /** @api */
    case HY_AM = 'hy_AM';

    /** @api */
    case ID_ID = 'id_ID';

    /** @api */
    case IS_IS = 'is_IS';

    /** @api */
    case IT_CH = 'it_CH';

    /** @api */
    case IT_IT = 'it_IT';

    /** @api */
    case JA_JP = 'ja_JP';

    /** @api */
    case KA_GE = 'ka_GE';

    /** @api */
    case KK_KZ = 'kk_KZ';

    /** @api */
    case KM_KH = 'km_KH';

    /** @api */
    case KN_IN = 'kn_IN';

    /** @api */
    case KO_KR = 'ko_KR';

    /** @api */
    case KY_KG = 'ky_KG';

    /** @api */
    case LO_LA = 'lo_LA';

    /** @api */
    case LT_LT = 'lt_LT';

    /** @api */
    case LV_LV = 'lv_LV';

    /** @api */
    case MI_NZ = 'mi_NZ';

    /** @api */
    case MK_MK = 'mk_MK';

    /** @api */
    case MN_MN = 'mn_MN';

    /** @api */
    case MR_IN = 'mr_IN';

    /** @api */
    case MS_BN = 'ms_BN';

    /** @api */
    case MS_MY = 'ms_MY';

    /** @api */
    case MT_MT = 'mt_MT';

    /** @api */
    case NB_NO = 'nb_NO';

    /** @api */
    case NE_NP = 'ne_NP';

    /** @api */
    case NL_BE = 'nl_BE';

    /** @api */
    case NL_NL = 'nl_NL';

    /** @api */
    case NN_NO = 'nn_NO';

    /** @api */
    case OR_IN = 'or_IN';

    /** @api */
    case PA_IN = 'pa_IN';

    /** @api */
    case PL_PL = 'pl_PL';

    /** @api */
    case PS_AF = 'ps_AF';

    /** @api */
    case PT_BR = 'pt_BR';

    /** @api */
    case PT_PT = 'pt_PT';

    /** @api */
    case RO_RO = 'ro_RO';

    /** @api */
    case RU_RU = 'ru_RU';

    /** @api */
    case RW_RW = 'rw_RW';

    /** @api */
    case SI_LK = 'si_LK';

    /** @api */
    case SK_SK = 'sk_SK';

    /** @api */
    case SL_SI = 'sl_SI';

    /** @api */
    case SQ_AL = 'sq_AL';

    /** @api */
    case SR_RS = 'sr_RS';

    /** @api */
    case SV_SE = 'sv_SE';

    /** @api */
    case SW_KE = 'sw_KE';

    /** @api */
    case TA_IN = 'ta_IN';

    /** @api */
    case TE_IN = 'te_IN';

    /** @api */
    case TH_TH = 'th_TH';

    /** @api */
    case TI_ET = 'ti_ET';

    /** @api */
    case TR_TR = 'tr_TR';

    /** @api */
    case UK_UA = 'uk_UA';

    /** @api */
    case UR_PK = 'ur_PK';

    /** @api */
    case VI_VN = 'vi_VN';

    /** @api */
    case ZH_CN = 'zh_CN';

    /** @api */
    case ZH_HK = 'zh_HK';

    /** @api */
    case ZH_TW = 'zh_TW';

    private const NAMES = [
        'af_ZA' => 'Afrikaans (South Africa)',
        'am_ET' => 'Amharic (Ethiopia)',
        'ar_AE' => 'Arabic (U.A.E.)',
        'ar_BH' => 'Arabic (Bahrain)',
        'ar_DZ' => 'Arabic (Algeria)',
        'ar_EG' => 'Arabic (Egypt)',
        'ar_IQ' => 'Arabic (Iraq)',
        'ar_JO' => 'Arabic (Jordan)',
        'ar_KW' => 'Arabic (Kuwait)',
        'ar_LB' => 'Arabic (Lebanon)',
        'ar_LY' => 'Arabic (Libya)',
        'ar_MA' => 'Arabic (Morocco)',
        'ar_OM' => 'Arabic (Oman)',
        'ar_QA' => 'Arabic (Qatar)',
        'ar_SA' => 'Arabic (Saudi Arabia)',
        'ar_SD' => 'Arabic (Sudan)',
        'ar_SY' => 'Arabic (Syria)',
        'ar_TN' => 'Arabic (Tunisia)',
        'ar_YE' => 'Arabic (Yemen)',
        'be_BY' => 'Belarusian (Belarus)',
        'bg_BG' => 'Bulgarian (Bulgaria)',
        'bn_BD' => 'Bengali (Bangladesh)',
        'bn_IN' => 'Bengali (India)',
        'ca_ES' => 'Catalan (Spain)',
        'cs_CZ' => 'Czech (Czech Republic)',
        'cy_GB' => 'Welsh (United Kingdom)',
        'da_DK' => 'Danish (Denmark)',
        'de_AT' => 'German (Austria)',
        'de_BE' => 'German (Belgium)',
        'de_CH' => 'German (Switzerland)',
        'de_DE' => 'German (Germany)',
        'de_LI' => 'German (Liechtenstein)',
        'de_LU' => 'German (Luxembourg)',
        'el_CY' => 'Greek (Cyprus)',
        'el_GR' => 'Greek (Greece)',
        'en_AU' => 'English (Australia)',
        'en_BW' => 'English (Botswana)',
        'en_CA' => 'English (Canada)',
        'en_GB' => 'English (United Kingdom)',
        'en_HK' => 'English (Hong Kong)',
        'en_IE' => 'English (Ireland)',
        'en_IN' => 'English (India)',
        'en_JM' => 'English (Jamaica)',
        'en_MH' => 'English (Marshall Islands)',
        'en_MT' => 'English (Malta)',
        'en_NA' => 'English (Namibia)',
        'en_NZ' => 'English (New Zealand)',
        'en_PH' => 'English (Philippines)',
        'en_PK' => 'English (Pakistan)',
        'en_SG' => 'English (Singapore)',
        'en_TT' => 'English (Trinidad & Tobago)',
        'en_US' => 'English (United States)',
        'en_ZA' => 'English (South Africa)',
        'en_ZW' => 'English (Zimbabwe)',
        'es_AR' => 'Spanish (Argentina)',
        'es_BO' => 'Spanish (Bolivia)',
        'es_CL' => 'Spanish (Chile)',
        'es_CO' => 'Spanish (Colombia)',
        'es_CR' => 'Spanish (Costa Rica)',
        'es_DO' => 'Spanish (Dominican Republic)',
        'es_EC' => 'Spanish (Ecuador)',
        'es_ES' => 'Spanish (Spain)',
        'es_GT' => 'Spanish (Guatemala)',
        'es_HN' => 'Spanish (Honduras)',
        'es_MX' => 'Spanish (Mexico)',
        'es_NI' => 'Spanish (Nicaragua)',
        'es_PA' => 'Spanish (Panama)',
        'es_PE' => 'Spanish (Peru)',
        'es_PR' => 'Spanish (Puerto Rico)',
        'es_PY' => 'Spanish (Paraguay)',
        'es_SV' => 'Spanish (El Salvador)',
        'es_US' => 'Spanish (United States)',
        'es_UY' => 'Spanish (Uruguay)',
        'es_VE' => 'Spanish (Venezuela)',
        'et_EE' => 'Estonian (Estonia)',
        'eu_ES' => 'Basque (Spain)',
        'fa_IR' => 'Persian (Iran)',
        'fi_FI' => 'Finnish (Finland)',
        'fo_FO' => 'Faroese (Faroe Islands)',
        'fr_BE' => 'French (Belgium)',
        'fr_CA' => 'French (Canada)',
        'fr_CH' => 'French (Switzerland)',
        'fr_FR' => 'French (France)',
        'fr_LU' => 'French (Luxembourg)',
        'ga_IE' => 'Irish (Ireland)',
        'gl_ES' => 'Galician (Spain)',
        'he_IL' => 'Hebrew (Israel)',
        'hi_IN' => 'Hindi (India)',
        'hr_HR' => 'Croatian (Croatia)',
        'hu_HU' => 'Hungarian (Hungary)',
        'hy_AM' => 'Armenian (Armenia)',
        'id_ID' => 'Indonesian (Indonesia)',
        'is_IS' => 'Icelandic (Iceland)',
        'it_CH' => 'Italian (Switzerland)',
        'it_IT' => 'Italian (Italy)',
        'ja_JP' => 'Japanese (Japan)',
        'ka_GE' => 'Georgian (Georgia)',
        'kk_KZ' => 'Kazakh (Kazakhstan)',
        'km_KH' => 'Khmer (Cambodia)',
        'kn_IN' => 'Kannada (India)',
        'ko_KR' => 'Korean (South Korea)',
        'ky_KG' => 'Kyrgyz (Kyrgyzstan)',
        'lo_LA' => 'Lao (Laos)',
        'lt_LT' => 'Lithuanian (Lithuania)',
        'lv_LV' => 'Latvian (Latvia)',
        'mi_NZ' => 'Maori (New Zealand)',
        'mk_MK' => 'Macedonian (North Macedonia)',
        'mn_MN' => 'Mongolian (Mongolia)',
        'mr_IN' => 'Marathi (India)',
        'ms_BN' => 'Malay (Brunei)',
        'ms_MY' => 'Malay (Malaysia)',
        'mt_MT' => 'Maltese (Malta)',
        'nb_NO' => 'Norwegian Bokmål (Norway)',
        'ne_NP' => 'Nepali (Nepal)',
        'nl_BE' => 'Dutch (Belgium)',
        'nl_NL' => 'Dutch (Netherlands)',
        'nn_NO' => 'Norwegian Nynorsk (Norway)',
        'or_IN' => 'Odia (India)',
        'pa_IN' => 'Punjabi (India)',
        'pl_PL' => 'Polish (Poland)',
        'ps_AF' => 'Pashto (Afghanistan)',
        'pt_BR' => 'Portuguese (Brazil)',
        'pt_PT' => 'Portuguese (Portugal)',
        'ro_RO' => 'Romanian (Romania)',
        'ru_RU' => 'Russian (Russia)',
        'rw_RW' => 'Kinyarwanda (Rwanda)',
        'si_LK' => 'Sinhala (Sri Lanka)',
        'sk_SK' => 'Slovak (Slovakia)',
        'sl_SI' => 'Slovenian (Slovenia)',
        'sq_AL' => 'Albanian (Albania)',
        'sr_RS' => 'Serbian (Serbia)',
        'sv_SE' => 'Swedish (Sweden)',
        'sw_KE' => 'Swahili (Kenya)',
        'ta_IN' => 'Tamil (India)',
        'te_IN' => 'Telugu (India)',
        'th_TH' => 'Thai (Thailand)',
        'ti_ET' => 'Tigrinya (Ethiopia)',
        'tr_TR' => 'Turkish (Turkey)',
        'uk_UA' => 'Ukrainian (Ukraine)',
        'ur_PK' => 'Urdu (Pakistan)',
        'vi_VN' => 'Vietnamese (Vietnam)',
        'zh_CN' => 'Chinese (China)',
        'zh_HK' => 'Chinese (Hong Kong)',
        'zh_TW' => 'Chinese (Taiwan)',
    ];

    /** @api */
    public static function of(string $value): self
    {
        return self::from($value);
    }

    /** @api */
    public function code(): string
    {
        return $this->value;
    }

    /** @api */
    public function fullName(): string
    {
        return self::NAMES[$this->value];
    }
}
