<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Links;

use App\country;

use Jenssegers\Agent\Agent;

use App\Ip;

use Carbon\Carbon;

use App\User;

class AdminController extends Controller
{
  /** Returns a list of all admins */
  public function allAdmins()
  {
    $admins = User::where('role','admin')->get();
    return view('admin.pages.admins',compact('admins'));
  }
  
  /** delete a specify admin */
  public function deleteAdmin($id)
  {
    $user = User::find($id);
    $user->delete();
    return Redirect('/admin/admins')->with('delete','Admin Removed Successfully');
  }

  /** returns a list of all links */
  public function allLinks()
  {
    $links = Links::paginate(10);
    $countries  = Country::orderBy('created_at','desc')->first();
    return view('admin.pages.all_links',compact('links','countries'));
  }

  /** lists of all users */
  public function allUsersList()
  {
    $users = User::where('role', '!=', 'admin')->paginate(10);
    return view('admin.pages.allusers',compact('users'));
  }

  /** Piecharts of summary of all links */
  public function index()
  {

    $links_24 = IP::where('created_at', '>=', Carbon::now()->subDay())->get();


    $US = Links::select('US_visit')->sum('US_visit');
    $CA = Links::select('CA_visit')->sum('CA_visit');
    $GB = Links::select('GB_visit')->sum('GB_visit');
    $AU = Links::select('AU_visit')->sum('AU_visit');
    $DE = Links::select('DE_visit')->sum('DE_visit');
    $NO = Links::select('NO_visit')->sum('NO_visit');
    $AE = Links::select('AE_visit')->sum('AE_visit');
    $SE = Links::select('SE_visit')->sum('SE_visit');
    $ZA = Links::select('ZA_visit')->sum('ZA_visit');
    $FI = Links::select('FI_visit')->sum('FI_visit');
    $DK = Links::select('DK_visit')->sum('DK_visit');
    $NZ = Links::select('NZ_visit')->sum('NZ_visit');
    $PL = Links::select('PL_visit')->sum('PL_visit');
    $IE = Links::select('IE_visit')->sum('IE_visit');
    $CH = Links::select('CH_visit')->sum('CH_visit');
    $KW = Links::select('KW_visit')->sum('KW_visit');
    $QA = Links::select('QA_visit')->sum('QA_visit');
    $SA = Links::select('SA_visit')->sum('SA_visit');
    $BE = Links::select('BE_visit')->sum('BE_visit');
    $ES = Links::select('ES_visit')->sum('ES_visit');
    $KR = Links::select('KR_visit')->sum('KR_visit');
    $OM = Links::select('OM_visit')->sum('OM_visit');
    $CY = Links::select('CY_visit')->sum('CY_visit');
    $NL = Links::select('NL_visit')->sum('NL_visit');
    $CZ = Links::select('CZ_visit')->sum('CZ_visit');
    $IS = Links::select('IS_visit')->sum('IS_visit');
    $LU = Links::select('LU_visit')->sum('LU_visit');
    $GR = Links::select('GR_visit')->sum('GR_visit');
    $FR = Links::select('FR_visit')->sum('FR_visit');
    $SG = Links::select('SG_visit')->sum('SG_visit');
    $IL = Links::select('IL_visit')->sum('IL_visit');
    $JP = Links::select('JP_visit')->sum('JP_visit');
    $MY = Links::select('MY_visit')->sum('MY_visit');
    $NG = Links::select('NG_visit')->sum('NG_visit');
    $PT = Links::select('PT_visit')->sum('PT_visit');
    $IQ = Links::select('IQ_visit')->sum('IQ_visit');
    $PS = Links::select('PS_visit')->sum('PS_visit');
    $LV = Links::select('LV_visit')->sum('LV_visit');
    $SI = Links::select('SI_visit')->sum('SI_visit');
    $RU = Links::select('RU_visit')->sum('RU_visit');
    $BG = Links::select('BG_visit')->sum('BG_visit');
    $RS = Links::select('RS_visit')->sum('RS_visit');
    $ME = Links::select('ME_visit')->sum('ME_visit');
    $TH = Links::select('TH_visit')->sum('TH_visit');
    $LK = Links::select('LK_visit')->sum('LK_visit');
    $MM = Links::select('MM_visit')->sum('MM_visit');
    $IT = Links::select('IT_visit')->sum('IT_visit');
    $JO = Links::select('JO_visit')->sum('JO_visit');
    $KE = Links::select('KE_visit')->sum('KE_visit');
    $IR = Links::select('IR_visit')->sum('IR_visit');
    $GH = Links::select('GH_visit')->sum('GH_visit');
    $PA = Links::select('PA_visit')->sum('PA_visit');
    $MO = Links::select('MO_visit')->sum('MO_visit');
    $KZ = Links::select('KZ_visit')->sum('KZ_visit');
    $BD = Links::select('BD_visit')->sum('BD_visit');
    $EE = Links::select('EE_visit')->sum('EE_visit');
    $LT = Links::select('LT_visit')->sum('LT_visit');
    $GE = Links::select('GE_visit')->sum('GE_visit');
    $MX = Links::select('MX_visit')->sum('MX_visit');
    $IO = Links::select('IO_visit')->sum('IO_visit');
    $MD = Links::select('MD_visit')->sum('MD_visit');
    $TZ = Links::select('TZ_visit')->sum('TZ_visit');
    $INDO = Links::select('INDO_visit')->sum('INDO_visit');
    $CI = Links::select('CI_visit')->sum('CI_visit');
    $BR = Links::select('BR_visit')->sum('BR_visit');
    $BA = Links::select('BA_visit')->sum('BA_visit');
    $HN = Links::select('HN_visit')->sum('HN_visit');
    $IN = Links::select('IN_visit')->sum('IN_visit');
    $VN = Links::select('VN_visit')->sum('VN_visit');
    $TW = Links::select('TW_visit')->sum('TW_visit');
    $GT = Links::select('GT_visit')->sum('GT_visit');
    $CN = Links::select('CN_visit')->sum('CN_visit');
    $KH = Links::select('KH_visit')->sum('KH_visit');
    $AT = Links::select('AT_visit')->sum('AT_visit');
    $SK = Links::select('SK_visit')->sum('SK_visit');
    $AM = Links::select('AM_visit')->sum('AM_visit');
    $AL = Links::select('AL_visit')->sum('AL_visit');
    $MK = Links::select('MK_visit')->sum('MK_visit');
    $TM = Links::select('TM_visit')->sum('TM_visit');
    $LB = Links::select('LB_visit')->sum('LB_visit');
    $EC = Links::select('EC_visit')->sum('EC_visit');
    $PH = Links::select('PH_visit')->sum('PH_visit');
    $HU = Links::select('HU_visit')->sum('HU_visit');
    $EG = Links::select('EG_visit')->sum('EG_visit');
    $PK = Links::select('PK_visit')->sum('PK_visit');
    $CM = Links::select('CM_visit')->sum('CM_visit');
    $UA = Links::select('UA_visit')->sum('UA_visit');
    $BM = Links::select('BM_visit')->sum('BM_visit');
    $NC = Links::select('NC_visit')->sum('NC_visit');
    $LY = Links::select('LY_visit')->sum('LY_visit');
    $AR = Links::select('AR_visit')->sum('AR_visit');
    $HK = Links::select('HK_visit')->sum('HK_visit');
    $TR = Links::select('TR_visit')->sum('TR_visit');
    $DZ = Links::select('DZ_visit')->sum('DZ_visit');
    $RO = Links::select('RO_visit')->sum('RO_visit');
    $BS = Links::select('BS_visit')->sum('BS_visit');
    $GL = Links::select('GL_visit')->sum('GL_visit');
    $LR = Links::select('LR_visit')->sum('LR_visit');
    $MF = Links::select('MF_visit')->sum('MF_visit');
    $BT = Links::select('BT_visit')->sum('BT_visit');
    $GF = Links::select('GF_visit')->sum('GF_visit');
    $NP = Links::select('NP_visit')->sum('NP_visit');
    $AF = Links::select('AF_visit')->sum('AF_visit');
    $CU = Links::select('CU_visit')->sum('CU_visit');
    $SV = Links::select('SV_visit')->sum('SV_visit');
    $SM = Links::select('SM_visit')->sum('SM_visit');
    $others = Links::select('others_visit')->sum('others_visit');


    $chartjs = app()->chartjs
      ->name('pieChartTest')
      ->type('pie')
      ->size(['width' => 400, 'height' => 200])
      ->labels(['United States', 'Canada','United Kingdom','Austrilia','Germany','Norway','united Arab emirates','Sweden','South Arfica','Finland','Denmark','Newzeland','Poland','Ireland','Switzerland','Kuwait','Qatar','Saudi Arabia','Belgium','Spain','Korea, Republic Of','Oman','Cyprus','Netherlands','Czech Republic','Iceland','Luxembourg','Greece','France','Singapore','Israel','Japan','Malaysia','Nigeria','Portugal','Iraq','Latvia','PALESTINIAN TERRITORY, OCCUPIED','Slovenia','Russian Federation','Bulgaria','Serbia','Montenegro','Thailand','Sri Lanka','Myanmar','Italy','Jordan','Kenya','Iran, Islamic Republic Of','Ghana','Panama','Macao','Kazakhstan','Bangladesh','Estonia','Lithuania','Georgia','Mexico','British Indian Ocean Territory','Moldova','Tanzania, United Republic Of','Indonesia','Cote Divoire','Brazil','Bosnia And Herzegovina','Honduras','India','Vietnam','Taiwan','Guatemala','China','Cambodia','Austria','Slovakia','Armenia','Albania','Macedonia, The Former Yugoslav Republic Of','Turkmenistan','Lebanon','Ecuador','Philippines','Hungary','Egypt','Pakistan','Cameroon','Ukraine','Bermuda','New Caledonia','Libya','Argentina','Hong Kong','Turkey','Algeria','Romania','Bahamas','Greenland','Liberia','Saint Martin','Bhutan','French Guiana','Nepal','Afghanistan','Cuba','El Salvador','San Marino'])
      ->datasets([
        [
        'backgroundColor' => ['#FF6384', '#36A2EB','#B0171F','#DC143C','#EE1289','  #0048BA','#4C2F27','#B0BF1A','#7CB9E8','#B284BE','#5D8AA8','#84DE02','#C46210','#EFDECD','#E52B50','#9F2B68','#F19CBB','#AB274F ','#D3212D',' #3B7A57','#00C4B0','#FFBF00','#FF7E00','#3B3B6D','#804040','  #D3AF37','#34B334','#FF8B00','#FF9899','#431C53','#B32134','#FF033E','#CFCFCF','#551B8C','#F2B400','#9966CC','#A4C639','#CD9575','#665D1E','#915C83','#841B2D','#FAEBD7','#008000','#66B447','#00FFFF','#87A96B','#003A6C','#FF9966','#A52A2A','#FDEE00','#6E7F80','#568203','#FF2052','#63775B','#C39953','#007FFF','#006A4E','#E0218A','#7C0A02','#1DACD6','#FA6E79','#2E5894 ',' #9C2542','#E88E5A','#967117','#FE6F5E','#8F5973','#D1001C','#0095B6','#006A4E','#873260','#B5A642','#BF94E4','#FF007F','#FFAA1D','#F4BBFF','#737000','#A52A2A','#CC5500','#E97451','#8A3324','#E4717A','#FFD59A','#FFA6C9','#FF6600','#D56C2B','#663398','#4D084B','#CD5B45','#008B8B','#536878','#9932CC','#779ECB','#03C03C','#966FD6','#C23B22','#E75480','#003399','#00CED1','#D1BEA8','#9400D3','#9B870C','#555555','#843F5B','#EDC9AF','#2243B6'],
        'hoverBackgroundColor' => ['#FF6384', '#36A2EB','#B0171F','#DC143C','#EE1289',' #0048BA','#4C2F27','#B0BF1A','#7CB9E8','#B284BE','#5D8AA8','#84DE02','#C46210','#EFDECD','#E52B50','#9F2B68','#F19CBB','#AB274F ','#D3212D',' #3B7A57','#00C4B0','#FFBF00','#FF7E00','#3B3B6D','#804040','  #D3AF37','#34B334','#FF8B00','#FF9899','#431C53','#B32134','#FF033E','#CFCFCF','#551B8C','#F2B400','#9966CC','#A4C639','#CD9575','#665D1E','#915C83','#841B2D','#FAEBD7','#008000','#66B447','#00FFFF','#87A96B','#003A6C','#FF9966','#A52A2A','#FDEE00','#6E7F80','#568203','#FF2052','#63775B','#C39953','#007FFF','#006A4E','#E0218A','#7C0A02','#1DACD6','#FA6E79','#2E5894 ',' #9C2542','#E88E5A','#967117','#FE6F5E','#8F5973','#D1001C','#0095B6','#006A4E','#873260','#B5A642','#BF94E4','#FF007F','#FFAA1D','#F4BBFF','#737000','#A52A2A','#CC5500','#E97451','#8A3324','#E4717A','#FFD59A','#FFA6C9','#FF6600','#D56C2B','#663398','#4D084B','#CD5B45','#008B8B','#536878','#9932CC','#779ECB','#03C03C','#966FD6','#C23B22','#E75480','#003399','#00CED1','#D1BEA8','#9400D3','#9B870C','#555555','#843F5B','#EDC9AF','#2243B6'],
        'data' => [$US, 
               $CA, 
               $GB, 
               $AU, 
               $DE, 
               $NO, 
               $AE, 
               $SE, 
               $ZA, 
               $FI,
               $DK,
               $NZ,
               $PL,
               $IE,
               $CH,
               $KW,
               $QA,
               $SA,
               $BE,
               $ES,
               $KR,
               $OM,
               $CY,
               $NL,
               $CZ,
               $IS,
               $LU,
               $GR,
               $FR,
               $SG,
               $IL,
               $JP,
               $MY,
               $NG,
               $PT,
               $IQ,
               $LV,
               $PS,
               $SI,
               $RU,
               $BG,
               $RS,
               $ME,
               $TH,
               $LK,
               $MM,
               $IT,
               $JO,
               $KE,
               $IR,
               $GH,
               $PA,
               $MO,
               $KZ,
               $BD,
               $EE,
               $LT,
               $GE,
               $MX,
               $IO,
               $MD,
               $TZ,
               $INDO,
               $CI,
               $BR,
               $BA,
               $HN,
               $IN,
               $VN,
               $TW,
               $GT,
               $CN,
               $KH,
               $AT,
               $SK,
               $AM,
               $AL,
               $MK,
               $TM,
               $LB,
               $EC,
               $PH,
               $HU,
               $EG,
               $PK,
               $CM,
               $UA,
               $BM,
               $NC,
               $LY,
               $AR,
               $HK,
               $TR,
               $DZ,
               $RO,
               $BS,
               $GL,
               $LR,
               $MF,
               $BT,
               $GF,
               $NP,
               $AF,
               $CU,
               $SV,
               $SM,
               $others,
              ]
      ]
      ])
      ->options([]);

    $DR_US = Links::select('US_visit_r')->sum('US_visit_r');
    $DR_CA = Links::select('CA_visit_r')->sum('CA_visit_r');
    $DR_GB = Links::select('GB_visit_r')->sum('GB_visit_r');
    $DR_AU = Links::select('AU_visit_r')->sum('AU_visit_r');
    $DR_DE = Links::select('DE_visit_r')->sum('DE_visit_r');
    $DR_NO = Links::select('NO_visit_r')->sum('NO_visit_r');
    $DR_AE = Links::select('AE_visit_r')->sum('AE_visit_r');
    $DR_SE = Links::select('SE_visit_r')->sum('SE_visit_r');
    $DR_ZA = Links::select('ZA_visit_r')->sum('ZA_visit_r');
    $DR_FI = Links::select('FI_visit_r')->sum('FI_visit_r');
    $DR_DK = Links::select('DK_visit_r')->sum('DK_visit_r');
    $DR_NZ = Links::select('NZ_visit_r')->sum('NZ_visit_r');
    $DR_PL = Links::select('PL_visit_r')->sum('PL_visit_r');
    $DR_IE = Links::select('IE_visit_r')->sum('IE_visit_r');
    $DR_CH = Links::select('CH_visit_r')->sum('CH_visit_r');
    $DR_KW = Links::select('KW_visit_r')->sum('KW_visit_r');
    $DR_QA = Links::select('QA_visit_r')->sum('QA_visit_r');
    $DR_SA = Links::select('SA_visit_r')->sum('SA_visit_r');
    $DR_BE = Links::select('BE_visit_r')->sum('BE_visit_r');
    $DR_ES = Links::select('ES_visit_r')->sum('ES_visit_r');
    $DR_KR = Links::select('KR_visit_r')->sum('KR_visit_r');
    $DR_OM = Links::select('OM_visit_r')->sum('OM_visit_r');
    $DR_CY = Links::select('CY_visit_r')->sum('CY_visit_r');
    $DR_NL = Links::select('NL_visit_r')->sum('NL_visit_r');
    $DR_CZ = Links::select('CZ_visit_r')->sum('CZ_visit_r');
    $DR_IS = Links::select('IS_visit_r')->sum('IS_visit_r');
    $DR_LU = Links::select('LU_visit_r')->sum('LU_visit_r');
    $DR_GR = Links::select('GR_visit_r')->sum('GR_visit_r');
    $DR_FR = Links::select('FR_visit_r')->sum('FR_visit_r');
    $DR_SG = Links::select('SG_visit_r')->sum('SG_visit_r');
    $DR_IL = Links::select('IL_visit_r')->sum('IL_visit_r');
    $DR_JP = Links::select('JP_visit_r')->sum('JP_visit_r');
    $DR_MY = Links::select('MY_visit_r')->sum('MY_visit_r');
    $DR_NG = Links::select('NG_visit_r')->sum('NG_visit_r');
    $DR_PT = Links::select('PT_visit_r')->sum('PT_visit_r');
    $DR_IQ = Links::select('IQ_visit_r')->sum('IQ_visit_r');
    $DR_PS = Links::select('PS_visit_r')->sum('PS_visit_r');
    $DR_LV = Links::select('LV_visit_r')->sum('LV_visit_r');
    $DR_SI = Links::select('SI_visit_r')->sum('SI_visit_r');
    $DR_RU = Links::select('RU_visit_r')->sum('RU_visit_r');
    $DR_BG = Links::select('BG_visit_r')->sum('BG_visit_r');
    $DR_RS = Links::select('RS_visit_r')->sum('RS_visit_r');
    $DR_ME = Links::select('ME_visit_r')->sum('ME_visit_r');
    $DR_TH = Links::select('TH_visit_r')->sum('TH_visit_r');
    $DR_LK = Links::select('LK_visit_r')->sum('LK_visit_r');
    $DR_MM = Links::select('MM_visit_r')->sum('MM_visit_r');
    $DR_IT = Links::select('IT_visit_r')->sum('IT_visit_r');
    $DR_JO = Links::select('JO_visit_r')->sum('JO_visit_r');
    $DR_KE = Links::select('KE_visit_r')->sum('KE_visit_r');
    $DR_IR = Links::select('IR_visit_r')->sum('IR_visit_r');
    $DR_GH = Links::select('GH_visit_r')->sum('GH_visit_r');
    $DR_PA = Links::select('PA_visit_r')->sum('PA_visit_r');
    $DR_MO = Links::select('MO_visit_r')->sum('MO_visit_r');
    $DR_KZ = Links::select('KZ_visit_r')->sum('KZ_visit_r');
    $DR_BD = Links::select('BD_visit_r')->sum('BD_visit_r');
    $DR_EE = Links::select('EE_visit_r')->sum('EE_visit_r');
    $DR_LT = Links::select('LT_visit_r')->sum('LT_visit_r');
    $DR_GE = Links::select('GE_visit_r')->sum('GE_visit_r');
    $DR_MX = Links::select('MX_visit_r')->sum('MX_visit_r');
    $DR_IO = Links::select('IO_visit_r')->sum('IO_visit_r');
    $DR_MD = Links::select('MD_visit_r')->sum('MD_visit_r');
    $DR_TZ = Links::select('TZ_visit_r')->sum('TZ_visit_r');
    $DR_INDO = Links::select('INDO_visit_r')->sum('INDO_visit_r');
    $DR_CI = Links::select('CI_visit_r')->sum('CI_visit_r');
    $DR_BR = Links::select('BR_visit_r')->sum('BR_visit_r');
    $DR_BA = Links::select('BA_visit_r')->sum('BA_visit_r');
    $DR_HN = Links::select('HN_visit_r')->sum('HN_visit_r');
    $DR_IN = Links::select('IN_visit_r')->sum('IN_visit_r');
    $DR_VN = Links::select('VN_visit_r')->sum('VN_visit_r');
    $DR_TW = Links::select('TW_visit_r')->sum('TW_visit_r');
    $DR_GT = Links::select('GT_visit_r')->sum('GT_visit_r');
    $DR_CN = Links::select('CN_visit_r')->sum('CN_visit_r');
    $DR_KH = Links::select('KH_visit_r')->sum('KH_visit_r');
    $DR_AT = Links::select('AT_visit_r')->sum('AT_visit_r');
    $DR_SK = Links::select('SK_visit_r')->sum('SK_visit_r');
    $DR_AM = Links::select('AM_visit_r')->sum('AM_visit_r');
    $DR_AL = Links::select('AL_visit_r')->sum('AL_visit_r');
    $DR_MK = Links::select('MK_visit_r')->sum('MK_visit_r');
    $DR_TM = Links::select('TM_visit_r')->sum('TM_visit_r');
    $DR_LB = Links::select('LB_visit_r')->sum('LB_visit_r');
    $DR_EC = Links::select('EC_visit_r')->sum('EC_visit_r');
    $DR_PH = Links::select('PH_visit_r')->sum('PH_visit_r');
    $DR_HU = Links::select('HU_visit_r')->sum('HU_visit_r');
    $DR_EG = Links::select('EG_visit_r')->sum('EG_visit_r');
    $DR_PK = Links::select('PK_visit_r')->sum('PK_visit_r');
    $DR_CM = Links::select('CM_visit_r')->sum('CM_visit_r');
    $DR_UA = Links::select('UA_visit_r')->sum('UA_visit_r');
    $DR_BM = Links::select('BM_visit_r')->sum('BM_visit_r');
    $DR_NC = Links::select('NC_visit_r')->sum('NC_visit_r');
    $DR_LY = Links::select('LY_visit_r')->sum('LY_visit_r');
    $DR_AR = Links::select('AR_visit_r')->sum('AR_visit_r');
    $DR_HK = Links::select('HK_visit_r')->sum('HK_visit_r');
    $DR_TR = Links::select('TR_visit_r')->sum('TR_visit_r');
    $DR_DZ = Links::select('DZ_visit_r')->sum('DZ_visit_r');
    $DR_RO = Links::select('RO_visit_r')->sum('RO_visit_r');
    $DR_BS = Links::select('BS_visit_r')->sum('BS_visit_r');
    $DR_GL = Links::select('GL_visit_r')->sum('GL_visit_r');
    $DR_LR = Links::select('LR_visit_r')->sum('LR_visit_r');
    $DR_MF = Links::select('MF_visit_r')->sum('MF_visit_r');
    $DR_BT = Links::select('BT_visit_r')->sum('BT_visit_r');
    $DR_GF = Links::select('GF_visit_r')->sum('GF_visit_r');
    $DR_NP = Links::select('NP_visit_r')->sum('NP_visit_r');
    $DR_AF = Links::select('AF_visit_r')->sum('AF_visit_r');
    $DR_CU = Links::select('CU_visit_r')->sum('CU_visit_r');
    $DR_SV = Links::select('SV_visit_r')->sum('SV_visit_r');
    $DR_SM = Links::select('SM_visit_r')->sum('SM_visit_r');
    $DR_others = Links::select('others_visit_r')->sum('others_visit_r');


    $DR_chartjs = app()->chartjs
      ->name('pieChart')
      ->type('pie')
      ->size(['width' => 400, 'height' => 200])
      ->labels(['United States', 'Canada','United Kingdom','Austrilia','Germany','Norway','united Arab emirates','Sweden','South Arfica','Finland','Denmark','Newzeland','Poland','Ireland','Switzerland','Kuwait','Qatar','Saudi Arabia','Belgium','Spain','Korea, Republic Of','Oman','Cyprus','Netherlands','Czech Republic','Iceland','Luxembourg','Greece','France','Singapore','Israel','Japan','Malaysia','Nigeria','Portugal','Iraq','Latvia','PALESTINIAN TERRITORY, OCCUPIED','Slovenia','Russian Federation','Bulgaria','Serbia','Montenegro','Thailand','Sri Lanka','Myanmar','Italy','Jordan','Kenya','Iran, Islamic Republic Of','Ghana','Panama','Macao','Kazakhstan','Bangladesh','Estonia','Lithuania','Georgia','Mexico','British Indian Ocean Territory','Moldova','Tanzania, United Republic Of','Indonesia','Cote Divoire','Brazil','Bosnia And Herzegovina','Honduras','India','Vietnam','Taiwan','Guatemala','China','Cambodia','Austria','Slovakia','Armenia','Albania','Macedonia, The Former Yugoslav Republic Of','Turkmenistan','Lebanon','Ecuador','Philippines','Hungary','Egypt','Pakistan','Cameroon','Ukraine','Bermuda','New Caledonia','Libya','Argentina','Hong Kong','Turkey','Algeria','Romania','Bahamas','Greenland','Liberia','Saint Martin','Bhutan','French Guiana','Nepal','Afghanistan','Cuba','El Salvador','San Marino'])
      ->datasets([
        [
        'backgroundColor' => ['#FF6384', '#36A2EB','#B0171F','#DC143C','#EE1289','  #0048BA','#4C2F27','#B0BF1A','#7CB9E8','#B284BE','#5D8AA8','#84DE02','#C46210','#EFDECD','#E52B50','#9F2B68','#F19CBB','#AB274F ','#D3212D','   #3B7A57','#00C4B0','#FFBF00','#FF7E00','#3B3B6D','#804040','    #D3AF37','#34B334','#FF8B00','#FF9899','#431C53','#B32134','#FF033E','#CFCFCF','#551B8C','#F2B400','#9966CC','#A4C639','#CD9575','#665D1E','#915C83','#841B2D','#FAEBD7','#008000','#66B447','#00FFFF','#87A96B','#003A6C','#FF9966','#A52A2A','#FDEE00','#6E7F80','#568203','#FF2052','#63775B','#C39953','#007FFF','#006A4E','#E0218A','#7C0A02','#1DACD6','#FA6E79','#2E5894 ',' #9C2542','#E88E5A','#967117','#FE6F5E','#8F5973','#D1001C','#0095B6','#006A4E','#873260','#B5A642','#BF94E4','#FF007F','#FFAA1D','#F4BBFF','#737000','#A52A2A','#CC5500','#E97451','#8A3324','#E4717A','#FFD59A','#FFA6C9','#FF6600','#D56C2B','#663398','#4D084B','#CD5B45','#008B8B','#536878','#9932CC','#779ECB','#03C03C','#966FD6','#C23B22','#E75480','#003399','#00CED1','#D1BEA8','#9400D3','#9B870C','#555555','#843F5B','#EDC9AF','#2243B6'],
        'hoverBackgroundColor' => ['#FF6384', '#36A2EB','#B0171F','#DC143C','#EE1289',' #0048BA','#4C2F27','#B0BF1A','#7CB9E8','#B284BE','#5D8AA8','#84DE02','#C46210','#EFDECD','#E52B50','#9F2B68','#F19CBB','#AB274F ','#D3212D','   #3B7A57','#00C4B0','#FFBF00','#FF7E00','#3B3B6D','#804040','    #D3AF37','#34B334','#FF8B00','#FF9899','#431C53','#B32134','#FF033E','#CFCFCF','#551B8C','#F2B400','#9966CC','#A4C639','#CD9575','#665D1E','#915C83','#841B2D','#FAEBD7','#008000','#66B447','#00FFFF','#87A96B','#003A6C','#FF9966','#A52A2A','#FDEE00','#6E7F80','#568203','#FF2052','#63775B','#C39953','#007FFF','#006A4E','#E0218A','#7C0A02','#1DACD6','#FA6E79','#2E5894 ',' #9C2542','#E88E5A','#967117','#FE6F5E','#8F5973','#D1001C','#0095B6','#006A4E','#873260','#B5A642','#BF94E4','#FF007F','#FFAA1D','#F4BBFF','#737000','#A52A2A','#CC5500','#E97451','#8A3324','#E4717A','#FFD59A','#FFA6C9','#FF6600','#D56C2B','#663398','#4D084B','#CD5B45','#008B8B','#536878','#9932CC','#779ECB','#03C03C','#966FD6','#C23B22','#E75480','#003399','#00CED1','#D1BEA8','#9400D3','#9B870C','#555555','#843F5B','#EDC9AF','#2243B6'],
        'data' => [$DR_US, 
               $DR_CA, 
               $DR_GB, 
               $DR_AU, 
               $DR_DE, 
               $DR_NO, 
               $DR_AE, 
               $DR_SE, 
               $DR_ZA, 
               $DR_FI,
               $DR_DK,
               $DR_NZ,
               $DR_PL,
               $DR_IE,
               $DR_CH,
               $DR_KW,
               $DR_QA,
               $DR_SA,
               $DR_BE,
               $DR_ES,
               $DR_KR,
               $DR_OM,
               $DR_CY,
               $DR_NL,
               $DR_CZ,
               $DR_IS,
               $DR_LU,
               $DR_GR,
               $DR_FR,
               $DR_SG,
               $DR_IL,
               $DR_JP,
               $DR_MY,
               $DR_NG,
               $DR_PT,
               $DR_IQ,
               $DR_LV,
               $DR_PS,
               $DR_SI,
               $DR_RU,
               $DR_BG,
               $DR_RS,
               $DR_ME,
               $DR_TH,
               $DR_LK,
               $DR_MM,
               $DR_IT,
               $DR_JO,
               $DR_KE,
               $DR_IR,
               $DR_GH,
               $DR_PA,
               $DR_MO,
               $DR_KZ,
               $DR_BD,
               $DR_EE,
               $DR_LT,
               $DR_GE,
               $DR_MX,
               $DR_IO,
               $DR_MD,
               $DR_TZ,
               $DR_INDO,
               $DR_CI,
               $DR_BR,
               $DR_BA,
               $DR_HN,
               $DR_IN,
               $DR_VN,
               $DR_TW,
               $DR_GT,
               $DR_CN,
               $DR_KH,
               $DR_AT,
               $DR_SK,
               $DR_AM,
               $DR_AL,
               $DR_MK,
               $DR_TM,
               $DR_LB,
               $DR_EC,
               $DR_PH,
               $DR_HU,
               $DR_EG,
               $DR_PK,
               $DR_CM,
               $DR_UA,
               $DR_BM,
               $DR_NC,
               $DR_LY,
               $DR_AR,
               $DR_HK,
               $DR_TR,
               $DR_DZ,
               $DR_RO,
               $DR_BS,
               $DR_GL,
               $DR_LR,
               $DR_MF,
               $DR_BT,
               $DR_GF,
               $DR_NP,
               $DR_AF,
               $DR_CU,
               $DR_SV,
               $DR_SM,
               $DR_others,
              ]
      ]
      ])
      ->options([]);

    $m_US = Links::select('US_visit_mobile')->sum('US_visit_mobile');
    $m_CA = Links::select('CA_visit_mobile')->sum('CA_visit_mobile');
    $m_GB = Links::select('GB_visit_mobile')->sum('GB_visit_mobile');
    $m_AU = Links::select('AU_visit_mobile')->sum('AU_visit_mobile');
    $m_DE = Links::select('DE_visit_mobile')->sum('DE_visit_mobile');
    $m_NO = Links::select('NO_visit_mobile')->sum('NO_visit_mobile');
    $m_AE = Links::select('AE_visit_mobile')->sum('AE_visit_mobile');
    $m_SE = Links::select('SE_visit_mobile')->sum('SE_visit_mobile');
    $m_ZA = Links::select('ZA_visit_mobile')->sum('ZA_visit_mobile');
    $m_FI = Links::select('FI_visit_mobile')->sum('FI_visit_mobile');
    $m_DK = Links::select('DK_visit_mobile')->sum('DK_visit_mobile');
    $m_NZ = Links::select('NZ_visit_mobile')->sum('NZ_visit_mobile');
    $m_PL = Links::select('PL_visit_mobile')->sum('PL_visit_mobile');
    $m_IE = Links::select('IE_visit_mobile')->sum('IE_visit_mobile');
    $m_CH = Links::select('CH_visit_mobile')->sum('CH_visit_mobile');
    $m_KW = Links::select('KW_visit_mobile')->sum('KW_visit_mobile');
    $m_QA = Links::select('QA_visit_mobile')->sum('QA_visit_mobile');
    $m_SA = Links::select('SA_visit_mobile')->sum('SA_visit_mobile');
    $m_BE = Links::select('BE_visit_mobile')->sum('BE_visit_mobile');
    $m_ES = Links::select('ES_visit_mobile')->sum('ES_visit_mobile');
    $m_KR = Links::select('KR_visit_mobile')->sum('KR_visit_mobile');
    $m_OM = Links::select('OM_visit_mobile')->sum('OM_visit_mobile');
    $m_CY = Links::select('CY_visit_mobile')->sum('CY_visit_mobile');
    $m_NL = Links::select('NL_visit_mobile')->sum('NL_visit_mobile');
    $m_CZ = Links::select('CZ_visit_mobile')->sum('CZ_visit_mobile');
    $m_IS = Links::select('IS_visit_mobile')->sum('IS_visit_mobile');
    $m_LU = Links::select('LU_visit_mobile')->sum('LU_visit_mobile');
    $m_GR = Links::select('GR_visit_mobile')->sum('GR_visit_mobile');
    $m_FR = Links::select('FR_visit_mobile')->sum('FR_visit_mobile');
    $m_SG = Links::select('SG_visit_mobile')->sum('SG_visit_mobile');
    $m_IL = Links::select('IL_visit_mobile')->sum('IL_visit_mobile');
    $m_JP = Links::select('JP_visit_mobile')->sum('JP_visit_mobile');
    $m_MY = Links::select('MY_visit_mobile')->sum('MY_visit_mobile');
    $m_NG = Links::select('NG_visit_mobile')->sum('NG_visit_mobile');
    $m_PT = Links::select('PT_visit_mobile')->sum('PT_visit_mobile');
    $m_IQ = Links::select('IQ_visit_mobile')->sum('IQ_visit_mobile');
    $m_PS = Links::select('PS_visit_mobile')->sum('PS_visit_mobile');
    $m_LV = Links::select('LV_visit_mobile')->sum('LV_visit_mobile');
    $m_SI = Links::select('SI_visit_mobile')->sum('SI_visit_mobile');
    $m_RU = Links::select('RU_visit_mobile')->sum('RU_visit_mobile');
    $m_BG = Links::select('BG_visit_mobile')->sum('BG_visit_mobile');
    $m_RS = Links::select('RS_visit_mobile')->sum('RS_visit_mobile');
    $m_ME = Links::select('ME_visit_mobile')->sum('ME_visit_mobile');
    $m_TH = Links::select('TH_visit_mobile')->sum('TH_visit_mobile');
    $m_LK = Links::select('LK_visit_mobile')->sum('LK_visit_mobile');
    $m_MM = Links::select('MM_visit_mobile')->sum('MM_visit_mobile');
    $m_IT = Links::select('IT_visit_mobile')->sum('IT_visit_mobile');
    $m_JO = Links::select('JO_visit_mobile')->sum('JO_visit_mobile');
    $m_KE = Links::select('KE_visit_mobile')->sum('KE_visit_mobile');
    $m_IR = Links::select('IR_visit_mobile')->sum('IR_visit_mobile');
    $m_GH = Links::select('GH_visit_mobile')->sum('GH_visit_mobile');
    $m_PA = Links::select('PA_visit_mobile')->sum('PA_visit_mobile');
    $m_MO = Links::select('MO_visit_mobile')->sum('MO_visit_mobile');
    $m_KZ = Links::select('KZ_visit_mobile')->sum('KZ_visit_mobile');
    $m_BD = Links::select('BD_visit_mobile')->sum('BD_visit_mobile');
    $m_EE = Links::select('EE_visit_mobile')->sum('EE_visit_mobile');
    $m_LT = Links::select('LT_visit_mobile')->sum('LT_visit_mobile');
    $m_GE = Links::select('GE_visit_mobile')->sum('GE_visit_mobile');
    $m_MX = Links::select('MX_visit_mobile')->sum('MX_visit_mobile');
    $m_IO = Links::select('IO_visit_mobile')->sum('IO_visit_mobile');
    $m_MD = Links::select('MD_visit_mobile')->sum('MD_visit_mobile');
    $m_TZ = Links::select('TZ_visit_mobile')->sum('TZ_visit_mobile');
    $m_INDO = Links::select('INDO_visit_mobile')->sum('INDO_visit_mobile');
    $m_CI = Links::select('CI_visit_mobile')->sum('CI_visit_mobile');
    $m_BR = Links::select('BR_visit_mobile')->sum('BR_visit_mobile');
    $m_BA = Links::select('BA_visit_mobile')->sum('BA_visit_mobile');
    $m_HN = Links::select('HN_visit_mobile')->sum('HN_visit_mobile');
    $m_IN = Links::select('IN_visit_mobile')->sum('IN_visit_mobile');
    $m_VN = Links::select('VN_visit_mobile')->sum('VN_visit_mobile');
    $m_TW = Links::select('TW_visit_mobile')->sum('TW_visit_mobile');
    $m_GT = Links::select('GT_visit_mobile')->sum('GT_visit_mobile');
    $m_CN = Links::select('CN_visit_mobile')->sum('CN_visit_mobile');
    $m_KH = Links::select('KH_visit_mobile')->sum('KH_visit_mobile');
    $m_AT = Links::select('AT_visit_mobile')->sum('AT_visit_mobile');
    $m_SK = Links::select('SK_visit_mobile')->sum('SK_visit_mobile');
    $m_AM = Links::select('AM_visit_mobile')->sum('AM_visit_mobile');
    $m_AL = Links::select('AL_visit_mobile')->sum('AL_visit_mobile');
    $m_MK = Links::select('MK_visit_mobile')->sum('MK_visit_mobile');
    $m_TM = Links::select('TM_visit_mobile')->sum('TM_visit_mobile');
    $m_LB = Links::select('LB_visit_mobile')->sum('LB_visit_mobile');
    $m_EC = Links::select('EC_visit_mobile')->sum('EC_visit_mobile');
    $m_PH = Links::select('PH_visit_mobile')->sum('PH_visit_mobile');
    $m_HU = Links::select('HU_visit_mobile')->sum('HU_visit_mobile');
    $m_EG = Links::select('EG_visit_mobile')->sum('EG_visit_mobile');
    $m_PK = Links::select('PK_visit_mobile')->sum('PK_visit_mobile');
    $m_CM = Links::select('CM_visit_mobile')->sum('CM_visit_mobile');
    $m_UA = Links::select('UA_visit_mobile')->sum('UA_visit_mobile');
    $m_BM = Links::select('BM_visit_mobile')->sum('BM_visit_mobile');
    $m_NC = Links::select('NC_visit_mobile')->sum('NC_visit_mobile');
    $m_LY = Links::select('LY_visit_mobile')->sum('LY_visit_mobile');
    $m_AR = Links::select('AR_visit_mobile')->sum('AR_visit_mobile');
    $m_HK = Links::select('HK_visit_mobile')->sum('HK_visit_mobile');
    $m_TR = Links::select('TR_visit_mobile')->sum('TR_visit_mobile');
    $m_DZ = Links::select('DZ_visit_mobile')->sum('DZ_visit_mobile');
    $m_RO = Links::select('RO_visit_mobile')->sum('RO_visit_mobile');
    $m_BS = Links::select('BS_visit_mobile')->sum('BS_visit_mobile');
    $m_GL = Links::select('GL_visit_mobile')->sum('GL_visit_mobile');
    $m_LR = Links::select('LR_visit_mobile')->sum('LR_visit_mobile');
    $m_MF = Links::select('MF_visit_mobile')->sum('MF_visit_mobile');
    $m_BT = Links::select('BT_visit_mobile')->sum('BT_visit_mobile');
    $m_GF = Links::select('GF_visit_mobile')->sum('GF_visit_mobile');
    $m_NP = Links::select('NP_visit_mobile')->sum('NP_visit_mobile');
    $m_AF = Links::select('AF_visit_mobile')->sum('AF_visit_mobile');
    $m_CU = Links::select('CU_visit_mobile')->sum('CU_visit_mobile');
    $m_SV = Links::select('SV_visit_mobile')->sum('SV_visit_mobile');
    $m_SM = Links::select('SM_visit_mobile')->sum('SM_visit_mobile');
    $m_others = Links::select('others_visit_mobile')->sum('others_visit_mobile');


    $m_chartjs = app()->chartjs
      ->name('pie')
      ->type('pie')
      ->size(['width' => 400, 'height' => 200])
      ->labels(['United States', 'Canada','United Kingdom','Austrilia','Germany','Norway','united Arab emirates','Sweden','South Arfica','Finland','Denmark','Newzeland','Poland','Ireland','Switzerland','Kuwait','Qatar','Saudi Arabia','Belgium','Spain','Korea, Republic Of','Oman','Cyprus','Netherlands','Czech Republic','Iceland','Luxembourg','Greece','France','Singapore','Israel','Japan','Malaysia','Nigeria','Portugal','Iraq','Latvia','PALESTINIAN TERRITORY, OCCUPIED','Slovenia','Russian Federation','Bulgaria','Serbia','Montenegro','Thailand','Sri Lanka','Myanmar','Italy','Jordan','Kenya','Iran, Islamic Republic Of','Ghana','Panama','Macao','Kazakhstan','Bangladesh','Estonia','Lithuania','Georgia','Mexico','British Indian Ocean Territory','Moldova','Tanzania, United Republic Of','Indonesia','Cote Divoire','Brazil','Bosnia And Herzegovina','Honduras','India','Vietnam','Taiwan','Guatemala','China','Cambodia','Austria','Slovakia','Armenia','Albania','Macedonia, The Former Yugoslav Republic Of','Turkmenistan','Lebanon','Ecuador','Philippines','Hungary','Egypt','Pakistan','Cameroon','Ukraine','Bermuda','New Caledonia','Libya','Argentina','Hong Kong','Turkey','Algeria','Romania','Bahamas','Greenland','Liberia','Saint Martin','Bhutan','French Guiana','Nepal','Afghanistan','Cuba','El Salvador','San Marino'])
      ->datasets([
        [
        'backgroundColor' => ['#FF6384', '#36A2EB','#B0171F','#DC143C','#EE1289','  #0048BA','#4C2F27','#B0BF1A','#7CB9E8','#B284BE','#5D8AA8','#84DE02','#C46210','#EFDECD','#E52B50','#9F2B68','#F19CBB','#AB274F ','#D3212D','   #3B7A57','#00C4B0','#FFBF00','#FF7E00','#3B3B6D','#804040','    #D3AF37','#34B334','#FF8B00','#FF9899','#431C53','#B32134','#FF033E','#CFCFCF','#551B8C','#F2B400','#9966CC','#A4C639','#CD9575','#665D1E','#915C83','#841B2D','#FAEBD7','#008000','#66B447','#00FFFF','#87A96B','#003A6C','#FF9966','#A52A2A','#FDEE00','#6E7F80','#568203','#FF2052','#63775B','#C39953','#007FFF','#006A4E','#E0218A','#7C0A02','#1DACD6','#FA6E79','#2E5894 ',' #9C2542','#E88E5A','#967117','#FE6F5E','#8F5973','#D1001C','#0095B6','#006A4E','#873260','#B5A642','#BF94E4','#FF007F','#FFAA1D','#F4BBFF','#737000','#A52A2A','#CC5500','#E97451','#8A3324','#E4717A','#FFD59A','#FFA6C9','#FF6600','#D56C2B','#663398','#4D084B','#CD5B45','#008B8B','#536878','#9932CC','#779ECB','#03C03C','#966FD6','#C23B22','#E75480','#003399','#00CED1','#D1BEA8','#9400D3','#9B870C','#555555','#843F5B','#EDC9AF','#2243B6'],
        'hoverBackgroundColor' => ['#FF6384', '#36A2EB','#B0171F','#DC143C','#EE1289',' #0048BA','#4C2F27','#B0BF1A','#7CB9E8','#B284BE','#5D8AA8','#84DE02','#C46210','#EFDECD','#E52B50','#9F2B68','#F19CBB','#AB274F ','#D3212D','   #3B7A57','#00C4B0','#FFBF00','#FF7E00','#3B3B6D','#804040','    #D3AF37','#34B334','#FF8B00','#FF9899','#431C53','#B32134','#FF033E','#CFCFCF','#551B8C','#F2B400','#9966CC','#A4C639','#CD9575','#665D1E','#915C83','#841B2D','#FAEBD7','#008000','#66B447','#00FFFF','#87A96B','#003A6C','#FF9966','#A52A2A','#FDEE00','#6E7F80','#568203','#FF2052','#63775B','#C39953','#007FFF','#006A4E','#E0218A','#7C0A02','#1DACD6','#FA6E79','#2E5894 ',' #9C2542','#E88E5A','#967117','#FE6F5E','#8F5973','#D1001C','#0095B6','#006A4E','#873260','#B5A642','#BF94E4','#FF007F','#FFAA1D','#F4BBFF','#737000','#A52A2A','#CC5500','#E97451','#8A3324','#E4717A','#FFD59A','#FFA6C9','#FF6600','#D56C2B','#663398','#4D084B','#CD5B45','#008B8B','#536878','#9932CC','#779ECB','#03C03C','#966FD6','#C23B22','#E75480','#003399','#00CED1','#D1BEA8','#9400D3','#9B870C','#555555','#843F5B','#EDC9AF','#2243B6'],
        'data' => [$m_US, 
               $m_CA, 
               $m_GB, 
               $m_AU, 
               $m_DE, 
               $m_NO, 
               $m_AE, 
               $m_SE, 
               $m_ZA, 
               $m_FI,
               $m_DK,
               $m_NZ,
               $m_PL,
               $m_IE,
               $m_CH,
               $m_KW,
               $m_QA,
               $m_SA,
               $m_BE,
               $m_ES,
               $m_KR,
               $m_OM,
               $m_CY,
               $m_NL,
               $m_CZ,
               $m_IS,
               $m_LU,
               $m_GR,
               $m_FR,
               $m_SG,
               $m_IL,
               $m_JP,
               $m_MY,
               $m_NG,
               $m_PT,
               $m_IQ,
               $m_LV,
               $m_PS,
               $m_SI,
               $m_RU,
               $m_BG,
               $m_RS,
               $m_ME,
               $m_TH,
               $m_LK,
               $m_MM,
               $m_IT,
               $m_JO,
               $m_KE,
               $m_IR,
               $m_GH,
               $m_PA,
               $m_MO,
               $m_KZ,
               $m_BD,
               $m_EE,
               $m_LT,
               $m_GE,
               $m_MX,
               $m_IO,
               $m_MD,
               $m_TZ,
               $m_INDO,
               $m_CI,
               $m_BR,
               $m_BA,
               $m_HN,
               $m_IN,
               $m_VN,
               $m_TW,
               $m_GT,
               $m_CN,
               $m_KH,
               $m_AT,
               $m_SK,
               $m_AM,
               $m_AL,
               $m_MK,
               $m_TM,
               $m_LB,
               $m_EC,
               $m_PH,
               $m_HU,
               $m_EG,
               $m_PK,
               $m_CM,
               $m_UA,
               $m_BM,
               $m_NC,
               $m_LY,
               $m_AR,
               $m_HK,
               $m_TR,
               $m_DZ,
               $m_RO,
               $m_BS,
               $m_GL,
               $m_LR,
               $m_MF,
               $m_BT,
               $m_GF,
               $m_NP,
               $m_AF,
               $m_CU,
               $m_SV,
               $m_SM,
               $m_others,
              ]
      ]
      ])
      ->options([]);

    $mr_US = Links::select('US_visit_mr')->sum('US_visit_mr');
    $mr_CA = Links::select('CA_visit_mr')->sum('CA_visit_mr');
    $mr_GB = Links::select('GB_visit_mr')->sum('GB_visit_mr');
    $mr_AU = Links::select('AU_visit_mr')->sum('AU_visit_mr');
    $mr_DE = Links::select('DE_visit_mr')->sum('DE_visit_mr');
    $mr_NO = Links::select('NO_visit_mr')->sum('NO_visit_mr');
    $mr_AE = Links::select('AE_visit_mr')->sum('AE_visit_mr');
    $mr_SE = Links::select('SE_visit_mr')->sum('SE_visit_mr');
    $mr_ZA = Links::select('ZA_visit_mr')->sum('ZA_visit_mr');
    $mr_FI = Links::select('FI_visit_mr')->sum('FI_visit_mr');
    $mr_DK = Links::select('DK_visit_mr')->sum('DK_visit_mr');
    $mr_NZ = Links::select('NZ_visit_mr')->sum('NZ_visit_mr');
    $mr_PL = Links::select('PL_visit_mr')->sum('PL_visit_mr');
    $mr_IE = Links::select('IE_visit_mr')->sum('IE_visit_mr');
    $mr_CH = Links::select('CH_visit_mr')->sum('CH_visit_mr');
    $mr_KW = Links::select('KW_visit_mr')->sum('KW_visit_mr');
    $mr_QA = Links::select('QA_visit_mr')->sum('QA_visit_mr');
    $mr_SA = Links::select('SA_visit_mr')->sum('SA_visit_mr');
    $mr_BE = Links::select('BE_visit_mr')->sum('BE_visit_mr');
    $mr_ES = Links::select('ES_visit_mr')->sum('ES_visit_mr');
    $mr_KR = Links::select('KR_visit_mr')->sum('KR_visit_mr');
    $mr_OM = Links::select('OM_visit_mr')->sum('OM_visit_mr');
    $mr_CY = Links::select('CY_visit_mr')->sum('CY_visit_mr');
    $mr_NL = Links::select('NL_visit_mr')->sum('NL_visit_mr');
    $mr_CZ = Links::select('CZ_visit_mr')->sum('CZ_visit_mr');
    $mr_IS = Links::select('IS_visit_mr')->sum('IS_visit_mr');
    $mr_LU = Links::select('LU_visit_mr')->sum('LU_visit_mr');
    $mr_GR = Links::select('GR_visit_mr')->sum('GR_visit_mr');
    $mr_FR = Links::select('FR_visit_mr')->sum('FR_visit_mr');
    $mr_SG = Links::select('SG_visit_mr')->sum('SG_visit_mr');
    $mr_IL = Links::select('IL_visit_mr')->sum('IL_visit_mr');
    $mr_JP = Links::select('JP_visit_mr')->sum('JP_visit_mr');
    $mr_MY = Links::select('MY_visit_mr')->sum('MY_visit_mr');
    $mr_NG = Links::select('NG_visit_mr')->sum('NG_visit_mr');
    $mr_PT = Links::select('PT_visit_mr')->sum('PT_visit_mr');
    $mr_IQ = Links::select('IQ_visit_mr')->sum('IQ_visit_mr');
    $mr_PS = Links::select('PS_visit_mr')->sum('PS_visit_mr');
    $mr_LV = Links::select('LV_visit_mr')->sum('LV_visit_mr');
    $mr_SI = Links::select('SI_visit_mr')->sum('SI_visit_mr');
    $mr_RU = Links::select('RU_visit_mr')->sum('RU_visit_mr');
    $mr_BG = Links::select('BG_visit_mr')->sum('BG_visit_mr');
    $mr_RS = Links::select('RS_visit_mr')->sum('RS_visit_mr');
    $mr_ME = Links::select('ME_visit_mr')->sum('ME_visit_mr');
    $mr_TH = Links::select('TH_visit_mr')->sum('TH_visit_mr');
    $mr_LK = Links::select('LK_visit_mr')->sum('LK_visit_mr');
    $mr_MM = Links::select('MM_visit_mr')->sum('MM_visit_mr');
    $mr_IT = Links::select('IT_visit_mr')->sum('IT_visit_mr');
    $mr_JO = Links::select('JO_visit_mr')->sum('JO_visit_mr');
    $mr_KE = Links::select('KE_visit_mr')->sum('KE_visit_mr');
    $mr_IR = Links::select('IR_visit_mr')->sum('IR_visit_mr');
    $mr_GH = Links::select('GH_visit_mr')->sum('GH_visit_mr');
    $mr_PA = Links::select('PA_visit_mr')->sum('PA_visit_mr');
    $mr_MO = Links::select('MO_visit_mr')->sum('MO_visit_mr');
    $mr_KZ = Links::select('KZ_visit_mr')->sum('KZ_visit_mr');
    $mr_BD = Links::select('BD_visit_mr')->sum('BD_visit_mr');
    $mr_EE = Links::select('EE_visit_mr')->sum('EE_visit_mr');
    $mr_LT = Links::select('LT_visit_mr')->sum('LT_visit_mr');
    $mr_GE = Links::select('GE_visit_mr')->sum('GE_visit_mr');
    $mr_MX = Links::select('MX_visit_mr')->sum('MX_visit_mr');
    $mr_IO = Links::select('IO_visit_mr')->sum('IO_visit_mr');
    $mr_MD = Links::select('MD_visit_mr')->sum('MD_visit_mr');
    $mr_TZ = Links::select('TZ_visit_mr')->sum('TZ_visit_mr');
    $mr_INDO = Links::select('INDO_visit_mr')->sum('INDO_visit_mr');
    $mr_CI = Links::select('CI_visit_mr')->sum('CI_visit_mr');
    $mr_BR = Links::select('BR_visit_mr')->sum('BR_visit_mr');
    $mr_BA = Links::select('BA_visit_mr')->sum('BA_visit_mr');
    $mr_HN = Links::select('HN_visit_mr')->sum('HN_visit_mr');
    $mr_IN = Links::select('IN_visit_mr')->sum('IN_visit_mr');
    $mr_VN = Links::select('VN_visit_mr')->sum('VN_visit_mr');
    $mr_TW = Links::select('TW_visit_mr')->sum('TW_visit_mr');
    $mr_GT = Links::select('GT_visit_mr')->sum('GT_visit_mr');
    $mr_CN = Links::select('CN_visit_mr')->sum('CN_visit_mr');
    $mr_KH = Links::select('KH_visit_mr')->sum('KH_visit_mr');
    $mr_AT = Links::select('AT_visit_mr')->sum('AT_visit_mr');
    $mr_SK = Links::select('SK_visit_mr')->sum('SK_visit_mr');
    $mr_AM = Links::select('AM_visit_mr')->sum('AM_visit_mr');
    $mr_AL = Links::select('AL_visit_mr')->sum('AL_visit_mr');
    $mr_MK = Links::select('MK_visit_mr')->sum('MK_visit_mr');
    $mr_TM = Links::select('TM_visit_mr')->sum('TM_visit_mr');
    $mr_LB = Links::select('LB_visit_mr')->sum('LB_visit_mr');
    $mr_EC = Links::select('EC_visit_mr')->sum('EC_visit_mr');
    $mr_PH = Links::select('PH_visit_mr')->sum('PH_visit_mr');
    $mr_HU = Links::select('HU_visit_mr')->sum('HU_visit_mr');
    $mr_EG = Links::select('EG_visit_mr')->sum('EG_visit_mr');
    $mr_PK = Links::select('PK_visit_mr')->sum('PK_visit_mr');
    $mr_CM = Links::select('CM_visit_mr')->sum('CM_visit_mr');
    $mr_UA = Links::select('UA_visit_mr')->sum('UA_visit_mr');
    $mr_BM = Links::select('BM_visit_mr')->sum('BM_visit_mr');
    $mr_NC = Links::select('NC_visit_mr')->sum('NC_visit_mr');
    $mr_LY = Links::select('LY_visit_mr')->sum('LY_visit_mr');
    $mr_AR = Links::select('AR_visit_mr')->sum('AR_visit_mr');
    $mr_HK = Links::select('HK_visit_mr')->sum('HK_visit_mr');
    $mr_TR = Links::select('TR_visit_mr')->sum('TR_visit_mr');
    $mr_DZ = Links::select('DZ_visit_mr')->sum('DZ_visit_mr');
    $mr_RO = Links::select('RO_visit_mr')->sum('RO_visit_mr');
    $mr_BS = Links::select('BS_visit_mr')->sum('BS_visit_mr');
    $mr_GL = Links::select('GL_visit_mr')->sum('GL_visit_mr');
    $mr_LR = Links::select('LR_visit_mr')->sum('LR_visit_mr');
    $mr_MF = Links::select('MF_visit_mr')->sum('MF_visit_mr');
    $mr_BT = Links::select('BT_visit_mr')->sum('BT_visit_mr');
    $mr_GF = Links::select('GF_visit_mr')->sum('GF_visit_mr');
    $mr_NP = Links::select('NP_visit_mr')->sum('NP_visit_mr');
    $mr_AF = Links::select('AF_visit_mr')->sum('AF_visit_mr');
    $mr_CU = Links::select('CU_visit_mr')->sum('CU_visit_mr');
    $mr_SV = Links::select('SV_visit_mr')->sum('SV_visit_mr');
    $mr_SM = Links::select('SM_visit_mr')->sum('SM_visit_mr');
    $mr_others = Links::select('others_visit_mr')->sum('others_visit_mr');


    $mr_chartjs = app()->chartjs
      ->name('pie1')
      ->type('pie')
      ->size(['width' => 400, 'height' => 200])
      ->labels(['United States', 'Canada','United Kingdom','Austrilia','Germany','Norway','united Arab emirates','Sweden','South Arfica','Finland','Denmark','Newzeland','Poland','Ireland','Switzerland','Kuwait','Qatar','Saudi Arabia','Belgium','Spain','Korea, Republic Of','Oman','Cyprus','Netherlands','Czech Republic','Iceland','Luxembourg','Greece','France','Singapore','Israel','Japan','Malaysia','Nigeria','Portugal','Iraq','Latvia','PALESTINIAN TERRITORY, OCCUPIED','Slovenia','Russian Federation','Bulgaria','Serbia','Montenegro','Thailand','Sri Lanka','Myanmar','Italy','Jordan','Kenya','Iran, Islamic Republic Of','Ghana','Panama','Macao','Kazakhstan','Bangladesh','Estonia','Lithuania','Georgia','Mexico','British Indian Ocean Territory','Moldova','Tanzania, United Republic Of','Indonesia','Cote Divoire','Brazil','Bosnia And Herzegovina','Honduras','India','Vietnam','Taiwan','Guatemala','China','Cambodia','Austria','Slovakia','Armenia','Albania','Macedonia, The Former Yugoslav Republic Of','Turkmenistan','Lebanon','Ecuador','Philippines','Hungary','Egypt','Pakistan','Cameroon','Ukraine','Bermuda','New Caledonia','Libya','Argentina','Hong Kong','Turkey','Algeria','Romania','Bahamas','Greenland','Liberia','Saint Martin','Bhutan','French Guiana','Nepal','Afghanistan','Cuba','El Salvador','San Marino'])
      ->datasets([
        [
        'backgroundColor' => ['#FF6384', '#36A2EB','#B0171F','#DC143C','#EE1289','  #0048BA','#4C2F27','#B0BF1A','#7CB9E8','#B284BE','#5D8AA8','#84DE02','#C46210','#EFDECD','#E52B50','#9F2B68','#F19CBB','#AB274F ','#D3212D','   #3B7A57','#00C4B0','#FFBF00','#FF7E00','#3B3B6D','#804040','    #D3AF37','#34B334','#FF8B00','#FF9899','#431C53','#B32134','#FF033E','#CFCFCF','#551B8C','#F2B400','#9966CC','#A4C639','#CD9575','#665D1E','#915C83','#841B2D','#FAEBD7','#008000','#66B447','#00FFFF','#87A96B','#003A6C','#FF9966','#A52A2A','#FDEE00','#6E7F80','#568203','#FF2052','#63775B','#C39953','#007FFF','#006A4E','#E0218A','#7C0A02','#1DACD6','#FA6E79','#2E5894 ',' #9C2542','#E88E5A','#967117','#FE6F5E','#8F5973','#D1001C','#0095B6','#006A4E','#873260','#B5A642','#BF94E4','#FF007F','#FFAA1D','#F4BBFF','#737000','#A52A2A','#CC5500','#E97451','#8A3324','#E4717A','#FFD59A','#FFA6C9','#FF6600','#D56C2B','#663398','#4D084B','#CD5B45','#008B8B','#536878','#9932CC','#779ECB','#03C03C','#966FD6','#C23B22','#E75480','#003399','#00CED1','#D1BEA8','#9400D3','#9B870C','#555555','#843F5B','#EDC9AF','#2243B6'],
        'hoverBackgroundColor' => ['#FF6384', '#36A2EB','#B0171F','#DC143C','#EE1289',' #0048BA','#4C2F27','#B0BF1A','#7CB9E8','#B284BE','#5D8AA8','#84DE02','#C46210','#EFDECD','#E52B50','#9F2B68','#F19CBB','#AB274F ','#D3212D','   #3B7A57','#00C4B0','#FFBF00','#FF7E00','#3B3B6D','#804040','    #D3AF37','#34B334','#FF8B00','#FF9899','#431C53','#B32134','#FF033E','#CFCFCF','#551B8C','#F2B400','#9966CC','#A4C639','#CD9575','#665D1E','#915C83','#841B2D','#FAEBD7','#008000','#66B447','#00FFFF','#87A96B','#003A6C','#FF9966','#A52A2A','#FDEE00','#6E7F80','#568203','#FF2052','#63775B','#C39953','#007FFF','#006A4E','#E0218A','#7C0A02','#1DACD6','#FA6E79','#2E5894 ',' #9C2542','#E88E5A','#967117','#FE6F5E','#8F5973','#D1001C','#0095B6','#006A4E','#873260','#B5A642','#BF94E4','#FF007F','#FFAA1D','#F4BBFF','#737000','#A52A2A','#CC5500','#E97451','#8A3324','#E4717A','#FFD59A','#FFA6C9','#FF6600','#D56C2B','#663398','#4D084B','#CD5B45','#008B8B','#536878','#9932CC','#779ECB','#03C03C','#966FD6','#C23B22','#E75480','#003399','#00CED1','#D1BEA8','#9400D3','#9B870C','#555555','#843F5B','#EDC9AF','#2243B6'],
        'data' => [$mr_US, 
               $mr_CA, 
               $mr_GB, 
               $mr_AU, 
               $mr_DE, 
               $mr_NO, 
               $mr_AE, 
               $mr_SE, 
               $mr_ZA, 
               $mr_FI,
               $mr_DK,
               $mr_NZ,
               $mr_PL,
               $mr_IE,
               $mr_CH,
               $mr_KW,
               $mr_QA,
               $mr_SA,
               $mr_BE,
               $mr_ES,
               $mr_KR,
               $mr_OM,
               $mr_CY,
               $mr_NL,
               $mr_CZ,
               $mr_IS,
               $mr_LU,
               $mr_GR,
               $mr_FR,
               $mr_SG,
               $mr_IL,
               $mr_JP,
               $mr_MY,
               $mr_NG,
               $mr_PT,
               $mr_IQ,
               $mr_LV,
               $mr_PS,
               $mr_SI,
               $mr_RU,
               $mr_BG,
               $mr_RS,
               $mr_ME,
               $mr_TH,
               $mr_LK,
               $mr_MM,
               $mr_IT,
               $mr_JO,
               $mr_KE,
               $mr_IR,
               $mr_GH,
               $mr_PA,
               $mr_MO,
               $mr_KZ,
               $mr_BD,
               $mr_EE,
               $mr_LT,
               $mr_GE,
               $mr_MX,
               $mr_IO,
               $mr_MD,
               $mr_TZ,
               $mr_INDO,
               $mr_CI,
               $mr_BR,
               $mr_BA,
               $mr_HN,
               $mr_IN,
               $mr_VN,
               $mr_TW,
               $mr_GT,
               $mr_CN,
               $mr_KH,
               $mr_AT,
               $mr_SK,
               $mr_AM,
               $mr_AL,
               $mr_MK,
               $mr_TM,
               $mr_LB,
               $mr_EC,
               $mr_PH,
               $mr_HU,
               $mr_EG,
               $mr_PK,
               $mr_CM,
               $mr_UA,
               $mr_BM,
               $mr_NC,
               $mr_LY,
               $mr_AR,
               $mr_HK,
               $mr_TR,
               $mr_DZ,
               $mr_RO,
               $mr_BS,
               $mr_GL,
               $mr_LR,
               $mr_MF,
               $mr_BT,
               $mr_GF,
               $mr_NP,
               $mr_AF,
               $mr_CU,
               $mr_SV,
               $mr_SM,
               $mr_others,
              ]
      ]
      ])
      ->options([]);


    $users1 = User::whereMonth('created_at', '=', '01');
    $earnings1 = $users1->sum('earnings');
    $users1 = $users1->count();

    $users2 = User::whereMonth('created_at', '=', '02');
    $earnings2 = $users2->sum('earnings');
    $users2 = $users2->count();

    $users3 = User::whereMonth('created_at', '=', '03');
    $earnings3 = $users3->sum('earnings');
    $users3 = $users3->count();

    $users4 = User::whereMonth('created_at', '=', '04');
    $earnings4 = $users4->sum('earnings');
    $users4 = $users4->count();

    $users5 = User::whereMonth('created_at', '=', '05');
    $earnings5 = $users5->sum('earnings');
    $users5 = $users5->count();

    $users6 = User::whereMonth('created_at', '=', '06');
    $earnings6 = $users6->sum('earnings');
    $users6 = $users6->count();

    $users7 = User::whereMonth('created_at', '=', '07');
    $earnings7 = $users7->sum('earnings');
    $users7 = $users7->count();

    $users8 = User::whereMonth('created_at', '=', '08');
    $earnings8 = $users8->sum('earnings');
    $users8 = $users8->count();

    $users9 = User::whereMonth('created_at', '=', '09');
    $earnings9 = $users9->sum('earnings');
    $users9 = $users9->count();

    $users10 = User::whereMonth('created_at', '=', '010');
    $earnings10 = $users10->sum('earnings');
    $users10 = $users10->count();

    $users11 = User::whereMonth('created_at', '=', '011');
    $earnings11 = $users11->sum('earnings');
    $users11 = $users11->count();

    $users12 = User::whereMonth('created_at', '=', '012');
    $earnings12 = $users12->sum('earnings');
    $users12 = $users12->count();

    $bargraph = app()->chartjs
      ->name('barChartTest')
      ->type('bar')
      ->size(['width' => 400, 'height' => 200])
      ->labels(['January','February','March','April','May','June','July','August ','September','October', 'November','December'])
      ->datasets([
        [
        "label" => "Users",
        'backgroundColor' => ['#FF6384', '#FF6384'],
        'data' => [$users1, $users2, $users3, $users4, $users5, $users6, $users7, $users8, $users9, $users10, $users11, $users12]
      ],
        [
        "label" => "Earnings",
        'backgroundColor' => ['#3056DD', '#3056DD'],
        'data' => [$earnings1, $earnings2, $earnings3, $earnings4, $earnings5, $earnings6, $earnings7, $earnings8, $earnings9, $earnings10, $earnings11, $earnings12]
      ]
      ])
      ->options([]);
    return view('admin.admin', compact('links_24','chartjs','bargraph','DR_chartjs','m_chartjs','mr_chartjs'));

  }
}