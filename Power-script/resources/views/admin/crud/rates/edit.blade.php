@extends('layouts.admin')


@section('content')


<div class="content table-responsive table-full-width">
    <table class="table table-striped">
    <thead>
            <th></th>
        	<th></th>
        	<th><b>Desktop</b></th>
        	<th></th>
        	<th><b>Mobile</b></th>
        	<th></th>
        </thead>
        <thead>
            <th>ID</th>
        	<th>Country</th>
        	<th>Unique</th>
        	<th>Raw</th>
        	<th>Unique</th>
        	<th>Raw</th>
        </thead>
        <tbody>
             {!! Form::model($country,['route'=>['payoutrates.update',$country->id],'method'=>'PUT']) !!}
            <tr>
            	<td>1</td>
            	<td>United States</td>
            	<td>$<input type="text" name="us_d_u" value="{{$country->US}}"/></td>
            	<td>$<input type="text" name="us_d_r" value="{{$country->US_r}}"/></td>
            	<td>$<input type="text" name="us_m_u" value="{{$country->US_m}}"/></td>
            	<td>$<input type="text" name="us_m_r" value="{{$country->US_mr}}"/></td>
            </tr>
            <tr>
            	<td>2</td>
            	<td>Canada</td>
            	<td>$<input type="text" name="ca_d_u" value="{{$country->CA}}"/></td>
            	<td>$<input type="text" name="ca_d_r" value="{{$country->CA_r}}"/></td>
            	<td>$<input type="text" name="ca_m_u" value="{{$country->CA_m}}"/></td>
            	<td>$<input type="text" name="ca_m_r" value="{{$country->CA_mr}}"/></td>
            </tr>
            <tr>
            	<td>3</td>
            	<td>United Kingdom</td>
            	<td>$<input type="text" name="gb_d_u" value="{{$country->GB}}"/></td>
            	<td>$<input type="text" name="gb_d_r" value="{{$country->GB_r}}"/></td>
            	<td>$<input type="text" name="gb_m_u" value="{{$country->GB_m}}"/></td>
            	<td>$<input type="text" name="gb_m_r" value="{{$country->GB_mr}}"/></td>
            </tr>
            <tr>
            	<td>4</td>
            	<td>Austrilia</td>
            	<td>$<input type="text" name="au_d_u" value="{{$country->AU}}"/></td>
            	<td>$<input type="text" name="au_d_r" value="{{$country->AU_r}}"/></td>
            	<td>$<input type="text" name="au_m_u" value="{{$country->AU_m}}"/></td>
            	<td>$<input type="text" name="au_m_r" value="{{$country->AU_mr}}"/></td>
            </tr>
            <tr>
            	<td>5</td>
            	<td>Germany</td>
            	<td>$<input type="text" name="de_d_u" value="{{$country->DE}}"/></td>
            	<td>$<input type="text" name="de_d_r" value="{{$country->DE_r}}"/></td>
            	<td>$<input type="text" name="de_m_u" value="{{$country->DE_m}}"/></td>
            	<td>$<input type="text" name="de_m_r" value="{{$country->DE_mr}}"/></td>
            </tr>
            <tr>
            	<td>6</td>
            	<td>Norway</td>
            	<td>$<input type="text" name="no_d_u" value="{{$country->NO}}"/></td>
            	<td>$<input type="text" name="no_d_r" value="{{$country->NO_r}}"/></td>
            	<td>$<input type="text" name="no_m_u" value="{{$country->NO_m}}"/></td>
            	<td>$<input type="text" name="no_m_r" value="{{$country->NO_mr}}"/></td>
            </tr>
             <tr>
            	<td>7</td>
            	<td>United Arab emirates</td>
            	<td>$<input type="text" name="ae_d_u" value="{{$country->AE}}"/></td>
            	<td>$<input type="text" name="ae_d_r" value="{{$country->AE_r}}"/></td>
            	<td>$<input type="text" name="ae_m_u" value="{{$country->AE_m}}"/></td>
            	<td>$<input type="text" name="ae_m_r" value="{{$country->AE_mr}}"/></td>
            </tr>
            <tr>
            	<td>8</td>
            	<td>Sweden</td>
            	<td>$<input type="text" name="se_d_u" value="{{$country->SE}}"/></td>
            	<td>$<input type="text" name="se_d_r" value="{{$country->SE_r}}"/></td>
            	<td>$<input type="text" name="se_m_u" value="{{$country->SE_m}}"/></td>
            	<td>$<input type="text" name="se_m_r" value="{{$country->SE_mr}}"/></td>
            </tr>
            <tr>
            	<td>9</td>
            	<td>South Arfica</td>
            	<td>$<input type="text" name="za_d_u" value="{{$country->ZA}}"/></td>
            	<td>$<input type="text" name="za_d_r" value="{{$country->ZA_r}}"/></td>
            	<td>$<input type="text" name="za_m_u" value="{{$country->ZA_m}}"/></td>
            	<td>$<input type="text" name="za_m_r" value="{{$country->ZA_mr}}"/></td>
            </tr>
            <tr>
            	<td>10</td>
            	<td>Finland</td>
            	<td>$<input type="text" name="fi_d_u" value="{{$country->FI}}"/></td>
            	<td>$<input type="text" name="fi_d_r" value="{{$country->FI_r}}"/></td>
            	<td>$<input type="text" name="fi_m_u" value="{{$country->FI_m}}"/></td>
            	<td>$<input type="text" name="fi_m_r" value="{{$country->FI_mr}}"/></td>
            </tr>
            <tr>
            	<td>11</td>
            	<td>Denmark</td>
            	<td>$<input type="text" name="dk_d_u" value="{{$country->DK}}"/></td>
            	<td>$<input type="text" name="dk_d_r" value="{{$country->DK_r}}"/></td>
            	<td>$<input type="text" name="dk_m_u" value="{{$country->DK_m}}"/></td>
            	<td>$<input type="text" name="dk_m_r" value="{{$country->DK_mr}}"/></td>
            </tr>
            <tr>
            	<td>12</td>
            	<td>Newzeland</td>
            	<td>$<input type="text" name="nz_d_u" value="{{$country->NZ}}"/></td>
            	<td>$<input type="text" name="nz_d_r" value="{{$country->NZ_r}}"/></td>
            	<td>$<input type="text" name="nz_m_u" value="{{$country->NZ_m}}"/></td>
            	<td>$<input type="text" name="nz_m_r" value="{{$country->NZ_mr}}"/></td>
            </tr>
            <tr>
            	<td>13</td>
            	<td>Poland</td>
            	<td>$<input type="text" name="pl_d_u" value="{{$country->PL}}"/></td>
            	<td>$<input type="text" name="pl_d_r" value="{{$country->PL_r}}"/></td>
            	<td>$<input type="text" name="pl_m_u" value="{{$country->PL_m}}"/></td>
            	<td>$<input type="text" name="pl_m_r" value="{{$country->PL_mr}}"/></td>
            </tr>
            <tr>
            	<td>14</td>
            	<td>Ireland</td>
            	<td>$<input type="text" name="ie_d_u" value="{{$country->IE}}"/></td>
            	<td>$<input type="text" name="ie_d_r" value="{{$country->IE_r}}"/></td>
            	<td>$<input type="text" name="ie_m_u" value="{{$country->IE_m}}"/></td>
            	<td>$<input type="text" name="ie_m_r" value="{{$country->IE_mr}}"/></td>
            </tr>
            <tr>
            	<td>15</td>
            	<td>Switzerland</td>
            	<td>$<input type="text" name="ch_d_u" value="{{$country->CH}}"/></td>
            	<td>$<input type="text" name="ch_d_r" value="{{$country->CH_r}}"/></td>
            	<td>$<input type="text" name="ch_m_u" value="{{$country->CH_m}}"/></td>
            	<td>$<input type="text" name="ch_m_r" value="{{$country->CH_mr}}"/></td>
            </tr>
            <tr>
            	<td>16</td>
            	<td>Kuwait</td>
            	<td>$<input type="text" name="kw_d_u" value="{{$country->KW}}"/></td>
            	<td>$<input type="text" name="kw_d_r" value="{{$country->KW_r}}"/></td>
            	<td>$<input type="text" name="kw_m_u" value="{{$country->KW_m}}"/></td>
            	<td>$<input type="text" name="kw_m_r" value="{{$country->KW_mr}}"/></td>
            </tr>
            <tr>
            	<td>17</td>
            	<td>Qatar</td>
            	<td>$<input type="text" name="qa_d_u" value="{{$country->QA}}"/></td>
            	<td>$<input type="text" name="qa_d_r" value="{{$country->QA_r}}"/></td>
            	<td>$<input type="text" name="qa_m_u" value="{{$country->QA_m}}"/></td>
            	<td>$<input type="text" name="qa_m_r" value="{{$country->QA_mr}}"/></td>
            </tr>
            <tr>
            	<td>18</td>
            	<td>Saudi Arabia</td>
            	<td>$<input type="text" name="sa_d_u" value="{{$country->SA}}"/></td>
            	<td>$<input type="text" name="sa_d_r" value="{{$country->SA_r}}"/></td>
            	<td>$<input type="text" name="sa_m_u" value="{{$country->SA_m}}"/></td>
            	<td>$<input type="text" name="sa_m_r" value="{{$country->SA_mr}}"/></td>
            </tr>
             <tr>
            	<td>19</td>
            	<td>Belgium</td>
            	<td>$<input type="text" name="be_d_u" value="{{$country->BE}}"/></td>
            	<td>$<input type="text" name="be_d_r" value="{{$country->BE_r}}"/></td>
            	<td>$<input type="text" name="be_m_u" value="{{$country->BE_m}}"/></td>
            	<td>$<input type="text" name="be_m_r" value="{{$country->BE_mr}}"/></td>
            </tr>
            <tr>
            	<td>20</td>
            	<td>Spain</td>
            	<td>$<input type="text" name="es_d_u" value="{{$country->ES}}"/></td>
            	<td>$<input type="text" name="es_d_r" value="{{$country->ES_r}}"/></td>
            	<td>$<input type="text" name="es_m_u" value="{{$country->ES_m}}"/></td>
            	<td>$<input type="text" name="es_m_r" value="{{$country->ES_mr}}"/></td>
            </tr>
            <tr>
            	<td>21</td>
            	<td>Korea, Republic Of</td>
            	<td>$<input type="text" name="kr_d_u" value="{{$country->KR}}"/></td>
            	<td>$<input type="text" name="kr_d_r" value="{{$country->KR_r}}"/></td>
            	<td>$<input type="text" name="kr_m_u" value="{{$country->KR_m}}"/></td>
            	<td>$<input type="text" name="kr_m_r" value="{{$country->KR_mr}}"/></td>
            </tr>
            <tr>
            	<td>22</td>
            	<td>Oman</td>
            	<td>$<input type="text" name="om_d_u" value="{{$country->OM}}"/></td>
            	<td>$<input type="text" name="om_d_r" value="{{$country->OM_r}}"/></td>
            	<td>$<input type="text" name="om_m_u" value="{{$country->OM_m}}"/></td>
            	<td>$<input type="text" name="om_m_r" value="{{$country->OM_mr}}"/></td>
            </tr>
            <tr>
            	<td>23</td>
            	<td>Cyprus</td>
            	<td>$<input type="text" name="cy_d_u" value="{{$country->CY}}"/></td>
            	<td>$<input type="text" name="cy_d_r" value="{{$country->CY_r}}"/></td>
            	<td>$<input type="text" name="cy_m_u" value="{{$country->CY_m}}"/></td>
            	<td>$<input type="text" name="cy_m_r" value="{{$country->CY_mr}}"/></td>
            </tr>
            <tr>
            	<td>24</td>
            	<td>Netherlands</td>
            	<td>$<input type="text" name="nl_d_u" value="{{$country->NL}}"/></td>
            	<td>$<input type="text" name="nl_d_r" value="{{$country->NL_r}}"/></td>
            	<td>$<input type="text" name="nl_m_u" value="{{$country->NL_m}}"/></td>
            	<td>$<input type="text" name="nl_m_r" value="{{$country->NL_mr}}"/></td>
            </tr>
            <tr>
            	<td>25</td>
            	<td>Czech Republic</td>
            	<td>$<input type="text" name="cz_d_u" value="{{$country->CZ}}"/></td>
            	<td>$<input type="text" name="cz_d_r" value="{{$country->CZ_r}}"/></td>
            	<td>$<input type="text" name="cz_m_u" value="{{$country->CZ_m}}"/></td>
            	<td>$<input type="text" name="cz_m_r" value="{{$country->CZ_mr}}"/></td>
            </tr>
            <tr>
            	<td>26</td>
            	<td>Iceland</td>
            	<td>$<input type="text" name="is_d_u" value="{{$country->IS}}"/></td>
            	<td>$<input type="text" name="is_d_r" value="{{$country->IS_r}}"/></td>
            	<td>$<input type="text" name="is_m_u" value="{{$country->IS_m}}"/></td>
            	<td>$<input type="text" name="is_m_r" value="{{$country->IS_mr}}"/></td>
            </tr>
            <tr>
            	<td>27</td>
            	<td>Luxembourg</td>
            	<td>$<input type="text" name="lu_d_u" value="{{$country->LU}}"/></td>
            	<td>$<input type="text" name="lu_d_r" value="{{$country->LU_r}}"/></td>
            	<td>$<input type="text" name="lu_m_u" value="{{$country->LU_m}}"/></td>
            	<td>$<input type="text" name="lu_m_r" value="{{$country->LU_mr}}"/></td>
            </tr>
            <tr>
            	<td>28</td>
            	<td>Greece</td>
            	<td>$<input type="text" name="gr_d_u" value="{{$country->GR}}"/></td>
            	<td>$<input type="text" name="gr_d_r" value="{{$country->GR_r}}"/></td>
            	<td>$<input type="text" name="gr_m_u" value="{{$country->GR_m}}"/></td>
            	<td>$<input type="text" name="gr_m_r" value="{{$country->GR_mr}}"/></td>
            </tr>
             <tr>
            	<td>29</td>
            	<td>France</td>
            	<td>$<input type="text" name="fr_d_u" value="{{$country->FR}}"/></td>
            	<td>$<input type="text" name="fr_d_r" value="{{$country->FR_r}}"/></td>
            	<td>$<input type="text" name="fr_m_u" value="{{$country->FR_m}}"/></td>
            	<td>$<input type="text" name="fr_m_r" value="{{$country->FR_mr}}"/></td>
            </tr>
            <tr>
            	<td>30</td>
            	<td>Singapore</td>
            	<td>$<input type="text" name="sg_d_u" value="{{$country->SG}}"/></td>
            	<td>$<input type="text" name="sg_d_r" value="{{$country->SG_r}}"/></td>
            	<td>$<input type="text" name="sg_m_u" value="{{$country->SG_m}}"/></td>
            	<td>$<input type="text" name="sg_m_r" value="{{$country->SG_mr}}"/></td>
            </tr>

            <tr>
            	<td>31</td>
            	<td>Israel</td>
            	<td>$<input type="text" name="il_d_u" value="{{$country->IL}}"/></td>
            	<td>$<input type="text" name="il_d_r" value="{{$country->IL_r}}"/></td>
            	<td>$<input type="text" name="il_m_u" value="{{$country->IL_m}}"/></td>
            	<td>$<input type="text" name="il_m_r" value="{{$country->IL_mr}}"/></td>
            </tr>
            <tr>
            	<td>32</td>
            	<td>Japan</td>
            	<td>$<input type="text" name="jp_d_u" value="{{$country->JP}}"/></td>
            	<td>$<input type="text" name="jp_d_r" value="{{$country->JP_r}}"/></td>
            	<td>$<input type="text" name="jp_m_u" value="{{$country->JP_m}}"/></td>
            	<td>$<input type="text" name="jp_m_r" value="{{$country->JP_mr}}"/></td>
            </tr>
            <tr>
            	<td>33</td>
            	<td>Malaysia</td>
            	<td>$<input type="text" name="my_d_u" value="{{$country->MY}}"/></td>
            	<td>$<input type="text" name="my_d_r" value="{{$country->MY_r}}"/></td>
            	<td>$<input type="text" name="my_m_u" value="{{$country->MY_m}}"/></td>
            	<td>$<input type="text" name="my_m_r" value="{{$country->MY_mr}}"/></td>
            </tr>
            <tr>
            	<td>34</td>
            	<td>Nigeria</td>
            	<td>$<input type="text" name="ng_d_u" value="{{$country->NG}}"/></td>
            	<td>$<input type="text" name="ng_d_r" value="{{$country->NG_r}}"/></td>
            	<td>$<input type="text" name="ng_m_u" value="{{$country->NG_m}}"/></td>
            	<td>$<input type="text" name="ng_m_r" value="{{$country->NG_mr}}"/></td>
            </tr>
            <tr>
            	<td>35</td>
            	<td>Portugal</td>
            	<td>$<input type="text" name="pt_d_u" value="{{$country->PT}}"/></td>
            	<td>$<input type="text" name="pt_d_r" value="{{$country->PT_r}}"/></td>
            	<td>$<input type="text" name="pt_m_u" value="{{$country->PT_m}}"/></td>
            	<td>$<input type="text" name="pt_m_r" value="{{$country->PT_mr}}"/></td>
            </tr>
            <tr>
            	<td>36</td>
            	<td>Iraq</td>
            	<td>$<input type="text" name="iq_d_u" value="{{$country->IQ}}"/></td>
            	<td>$<input type="text" name="iq_d_r" value="{{$country->IQ_r}}"/></td>
            	<td>$<input type="text" name="iq_m_u" value="{{$country->IQ_m}}"/></td>
            	<td>$<input type="text" name="iq_m_r" value="{{$country->IQ_mr}}"/></td>
            </tr>
            <tr>
            	<td>37</td>
            	<td>Latvia</td>
            	<td>$<input type="text" name="lv_d_u" value="{{$country->LV}}"/></td>
            	<td>$<input type="text" name="lv_d_r" value="{{$country->LV_r}}"/></td>
            	<td>$<input type="text" name="lv_m_u" value="{{$country->LV_m}}"/></td>
            	<td>$<input type="text" name="lv_m_r" value="{{$country->LV_mr}}"/></td>
            </tr>
            <tr>
            	<td>38</td>
            	<td>PALESTINIAN TERRITORY, OCCUPIED</td>
            	<td>$<input type="text" name="ps_d_u" value="{{$country->PS}}"/></td>
            	<td>$<input type="text" name="ps_d_r" value="{{$country->PS_r}}"/></td>
            	<td>$<input type="text" name="ps_m_u" value="{{$country->PS_m}}"/></td>
            	<td>$<input type="text" name="ps_m_r" value="{{$country->PS_mr}}"/></td>
            </tr>
             <tr>
            	<td>39</td>
            	<td>Slovenia</td>
            	<td>$<input type="text" name="si_d_u" value="{{$country->SI}}"/></td>
            	<td>$<input type="text" name="si_d_r" value="{{$country->SI_r}}"/></td>
            	<td>$<input type="text" name="si_m_u" value="{{$country->SI_m}}"/></td>
            	<td>$<input type="text" name="si_m_r" value="{{$country->SI_mr}}"/></td>
            </tr>
            <tr>
            	<td>40</td>
            	<td>Russian Federation</td>
            	<td>$<input type="text" name="ru_d_u" value="{{$country->RU}}"/></td>
            	<td>$<input type="text" name="ru_d_r" value="{{$country->RU_r}}"/></td>
            	<td>$<input type="text" name="ru_m_u" value="{{$country->RU_m}}"/></td>
            	<td>$<input type="text" name="ru_m_r" value="{{$country->RU_mr}}"/></td>
            </tr>
            <tr>
            	<td>41</td>
            	<td>Bulgaria</td>
            	<td>$<input type="text" name="bg_d_u" value="{{$country->BG}}"/></td>
            	<td>$<input type="text" name="bg_d_r" value="{{$country->BG_r}}"/></td>
            	<td>$<input type="text" name="bg_m_u" value="{{$country->BG_m}}"/></td>
            	<td>$<input type="text" name="bg_m_r" value="{{$country->BG_mr}}"/></td>
            </tr>
            <tr>
            	<td>42</td>
            	<td>Serbia</td>
            	<td>$<input type="text" name="rs_d_u" value="{{$country->RS}}"/></td>
            	<td>$<input type="text" name="rs_d_r" value="{{$country->RS_r}}"/></td>
            	<td>$<input type="text" name="rs_m_u" value="{{$country->RS_m}}"/></td>
            	<td>$<input type="text" name="rs_m_r" value="{{$country->RS_mr}}"/></td>
            </tr>
            <tr>
            	<td>43</td>
            	<td>Montenegro</td>
            	<td>$<input type="text" name="me_d_u" value="{{$country->ME}}"/></td>
            	<td>$<input type="text" name="me_d_r" value="{{$country->ME_r}}"/></td>
            	<td>$<input type="text" name="me_m_u" value="{{$country->ME_m}}"/></td>
            	<td>$<input type="text" name="me_m_r" value="{{$country->ME_mr}}"/></td>
            </tr>
            <tr>
            	<td>44</td>
            	<td>Thailand</td>
            	<td>$<input type="text" name="th_d_u" value="{{$country->TH}}"/></td>
            	<td>$<input type="text" name="th_d_r" value="{{$country->TH_r}}"/></td>
            	<td>$<input type="text" name="th_m_u" value="{{$country->TH_m}}"/></td>
            	<td>$<input type="text" name="th_m_r" value="{{$country->TH_mr}}"/></td>
            </tr>
            <tr>
            	<td>45</td>
            	<td>Sri Lanka</td>
            	<td>$<input type="text" name="lk_d_u" value="{{$country->LK}}"/></td>
            	<td>$<input type="text" name="lk_d_r" value="{{$country->LK_r}}"/></td>
            	<td>$<input type="text" name="lk_m_u" value="{{$country->LK_m}}"/></td>
            	<td>$<input type="text" name="lk_m_r" value="{{$country->LK_mr}}"/></td>
            </tr>
            <tr>
            	<td>46</td>
            	<td>Myanmar</td>
            	<td>$<input type="text" name="mm_d_u" value="{{$country->MM}}"/></td>
            	<td>$<input type="text" name="mm_d_r" value="{{$country->MM_r}}"/></td>
            	<td>$<input type="text" name="mm_m_u" value="{{$country->MM_m}}"/></td>
            	<td>$<input type="text" name="mm_m_r" value="{{$country->MM_mr}}"/></td>
            </tr>
            <tr>
            	<td>47</td>
            	<td>Italy</td>
            	<td>$<input type="text" name="it_d_u" value="{{$country->IT}}"/></td>
            	<td>$<input type="text" name="it_d_r" value="{{$country->IT_r}}"/></td>
            	<td>$<input type="text" name="it_m_u" value="{{$country->IT_m}}"/></td>
            	<td>$<input type="text" name="it_m_r" value="{{$country->IT_mr}}"/></td>
            </tr>
            <tr>
            	<td>48</td>
            	<td>Jordan</td>
            	<td>$<input type="text" name="jo_d_u" value="{{$country->JO}}"/></td>
            	<td>$<input type="text" name="jo_d_r" value="{{$country->JO_r}}"/></td>
            	<td>$<input type="text" name="jo_m_u" value="{{$country->JO_m}}"/></td>
            	<td>$<input type="text" name="jo_m_r" value="{{$country->JO_mr}}"/></td>
            </tr>
             <tr>
            	<td>49</td>
            	<td>Kenya</td>
            	<td>$<input type="text" name="ke_d_u" value="{{$country->KE}}"/></td>
            	<td>$<input type="text" name="ke_d_r" value="{{$country->KE_r}}"/></td>
            	<td>$<input type="text" name="ke_m_u" value="{{$country->KE_m}}"/></td>
            	<td>$<input type="text" name="ke_m_r" value="{{$country->KE_mr}}"/></td>
            </tr>
            <tr>
            	<td>50</td>
            	<td>Iran, Islamic Republic Of</td>
            	<td>$<input type="text" name="ir_d_u" value="{{$country->IR}}"/></td>
            	<td>$<input type="text" name="ir_d_r" value="{{$country->IR_r}}"/></td>
            	<td>$<input type="text" name="ir_m_u" value="{{$country->IR_m}}"/></td>
            	<td>$<input type="text" name="ir_m_r" value="{{$country->IR_mr}}"/></td>
            </tr>
            <tr>
            	<td>51</td>
            	<td>Ghana</td>
            	<td>$<input type="text" name="gh_d_u" value="{{$country->GH}}"/></td>
            	<td>$<input type="text" name="gh_d_r" value="{{$country->GH_r}}"/></td>
            	<td>$<input type="text" name="gh_m_u" value="{{$country->GH_m}}"/></td>
            	<td>$<input type="text" name="gh_m_r" value="{{$country->GH_mr}}"/></td>
            </tr>
            <tr>
            	<td>52</td>
            	<td>Panama</td>
            	<td>$<input type="text" name="pa_d_u" value="{{$country->PA}}"/></td>
            	<td>$<input type="text" name="pa_d_r" value="{{$country->PA_r}}"/></td>
            	<td>$<input type="text" name="pa_m_u" value="{{$country->PA_m}}"/></td>
            	<td>$<input type="text" name="pa_m_r" value="{{$country->PA_mr}}"/></td>
            </tr>
            <tr>
            	<td>53</td>
            	<td>Macao</td>
            	<td>$<input type="text" name="mo_d_u" value="{{$country->MO}}"/></td>
            	<td>$<input type="text" name="mo_d_r" value="{{$country->MO_r}}"/></td>
            	<td>$<input type="text" name="mo_m_u" value="{{$country->MO_m}}"/></td>
            	<td>$<input type="text" name="mo_m_r" value="{{$country->MO_mr}}"/></td>
            </tr>
            <tr>
            	<td>54</td>
            	<td>Kazakhstan</td>
            	<td>$<input type="text" name="kz_d_u" value="{{$country->KZ}}"/></td>
            	<td>$<input type="text" name="kz_d_r" value="{{$country->KZ_r}}"/></td>
            	<td>$<input type="text" name="kz_m_u" value="{{$country->KZ_m}}"/></td>
            	<td>$<input type="text" name="kz_m_r" value="{{$country->KZ_mr}}"/></td>
            </tr>
            <tr>
            	<td>55</td>
            	<td>Bangladesh</td>
            	<td>$<input type="text" name="bd_d_u" value="{{$country->BD}}"/></td>
            	<td>$<input type="text" name="bd_d_r" value="{{$country->BD_r}}"/></td>
            	<td>$<input type="text" name="bd_m_u" value="{{$country->BD_m}}"/></td>
            	<td>$<input type="text" name="bd_m_r" value="{{$country->BD_mr}}"/></td>
            </tr>
            <tr>
            	<td>56</td>
            	<td>Estonia</td>
            	<td>$<input type="text" name="ee_d_u" value="{{$country->EE}}"/></td>
            	<td>$<input type="text" name="ee_d_r" value="{{$country->EE_r}}"/></td>
            	<td>$<input type="text" name="ee_m_u" value="{{$country->EE_m}}"/></td>
            	<td>$<input type="text" name="ee_m_r" value="{{$country->EE_mr}}"/></td>
            </tr>
            <tr>
            	<td>57</td>
            	<td>Lithuania</td>
            	<td>$<input type="text" name="lt_d_u" value="{{$country->LT}}"/></td>
            	<td>$<input type="text" name="lt_d_r" value="{{$country->LT_r}}"/></td>
            	<td>$<input type="text" name="lt_m_u" value="{{$country->LT_m}}"/></td>
            	<td>$<input type="text" name="lt_m_r" value="{{$country->LT_mr}}"/></td>
            </tr>
            <tr>
            	<td>58</td>
            	<td>Georgia</td>
            	<td>$<input type="text" name="ge_d_u" value="{{$country->GE}}"/></td>
            	<td>$<input type="text" name="ge_d_r" value="{{$country->GE_r}}"/></td>
            	<td>$<input type="text" name="ge_m_u" value="{{$country->GE_m}}"/></td>
            	<td>$<input type="text" name="ge_m_r" value="{{$country->GE_mr}}"/></td>
            </tr>
             <tr>
            	<td>59</td>
            	<td>Mexico</td>
            	<td>$<input type="text" name="mx_d_u" value="{{$country->MX}}"/></td>
            	<td>$<input type="text" name="mx_d_r" value="{{$country->MX_r}}"/></td>
            	<td>$<input type="text" name="mx_m_u" value="{{$country->MX_m}}"/></td>
            	<td>$<input type="text" name="mx_m_r" value="{{$country->MX_mr}}"/></td>
            </tr>
            <tr>
            	<td>60</td>
            	<td>British Indian Ocean Territory</td>
            	<td>$<input type="text" name="io_d_u" value="{{$country->IO}}"/></td>
            	<td>$<input type="text" name="io_d_r" value="{{$country->IO_r}}"/></td>
            	<td>$<input type="text" name="io_m_u" value="{{$country->IO_m}}"/></td>
            	<td>$<input type="text" name="io_m_r" value="{{$country->IO_mr}}"/></td>
            </tr>
            <tr>
            	<td>61</td>
            	<td>Moldova</td>
            	<td>$<input type="text" name="md_d_u" value="{{$country->MD}}"/></td>
            	<td>$<input type="text" name="md_d_r" value="{{$country->MD_r}}"/></td>
            	<td>$<input type="text" name="md_m_u" value="{{$country->MD_m}}"/></td>
            	<td>$<input type="text" name="md_m_r" value="{{$country->MD_mr}}"/></td>
            </tr>
            <tr>
            	<td>62</td>
            	<td>Tanzania, United Republic Of</td>
            	<td>$<input type="text" name="tz_d_u" value="{{$country->TZ}}"/></td>
            	<td>$<input type="text" name="tz_d_r" value="{{$country->TZ_r}}"/></td>
            	<td>$<input type="text" name="tz_m_u" value="{{$country->TZ_m}}"/></td>
            	<td>$<input type="text" name="tz_m_r" value="{{$country->TZ_mr}}"/></td>
            </tr>
            <tr>
            	<td>63</td>
            	<td>Indonesia</td>
            	<td>$<input type="text" name="indo_d_u" value="{{$country->INDO}}"/></td>
            	<td>$<input type="text" name="indo_d_r" value="{{$country->INDO_r}}"/></td>
            	<td>$<input type="text" name="indo_m_u" value="{{$country->INDO_m}}"/></td>
            	<td>$<input type="text" name="indo_m_r" value="{{$country->INDO_mr}}"/></td>
            </tr>
            <tr>
            	<td>64</td>
            	<td>Cote D'ivoire</td>
            	<td>$<input type="text" name="ci_d_u" value="{{$country->CI}}"/></td>
            	<td>$<input type="text" name="ci_d_r" value="{{$country->CI_r}}"/></td>
            	<td>$<input type="text" name="ci_m_u" value="{{$country->CI_m}}"/></td>
            	<td>$<input type="text" name="ci_m_r" value="{{$country->CI_mr}}"/></td>
            </tr>
            <tr>
            	<td>65</td>
            	<td>Brazil</td>
            	<td>$<input type="text" name="br_d_u" value="{{$country->BR}}"/></td>
            	<td>$<input type="text" name="br_d_r" value="{{$country->BR_r}}"/></td>
            	<td>$<input type="text" name="br_m_u" value="{{$country->BR_m}}"/></td>
            	<td>$<input type="text" name="br_m_r" value="{{$country->BR_mr}}"/></td>
            </tr>
            <tr>
            	<td>66</td>
            	<td>Bosnia And Herzegovina</td>
            	<td>$<input type="text" name="ba_d_u" value="{{$country->BA}}"/></td>
            	<td>$<input type="text" name="ba_d_r" value="{{$country->BA_r}}"/></td>
            	<td>$<input type="text" name="ba_m_u" value="{{$country->BA_m}}"/></td>
            	<td>$<input type="text" name="ba_m_r" value="{{$country->BA_mr}}"/></td>
            </tr>
            <tr>
            	<td>67</td>
            	<td>Lithuania</td>
            	<td>$<input type="text" name="hn_d_u" value="{{$country->HN}}"/></td>
            	<td>$<input type="text" name="hn_d_r" value="{{$country->HN_r}}"/></td>
            	<td>$<input type="text" name="hn_m_u" value="{{$country->HN_m}}"/></td>
            	<td>$<input type="text" name="hn_m_r" value="{{$country->HN_mr}}"/></td>
            </tr>
            <tr>
            	<td>68</td>
            	<td>India</td>
            	<td>$<input type="text" name="in_d_u" value="{{$country->IN}}"/></td>
            	<td>$<input type="text" name="in_d_r" value="{{$country->IN_r}}"/></td>
            	<td>$<input type="text" name="in_m_u" value="{{$country->IN_m}}"/></td>
            	<td>$<input type="text" name="in_m_r" value="{{$country->IN_mr}}"/></td>
            </tr>
             <tr>
            	<td>69</td>
            	<td>Vietnam</td>
            	<td>$<input type="text" name="vn_d_u" value="{{$country->VN}}"/></td>
            	<td>$<input type="text" name="vn_d_r" value="{{$country->VN_r}}"/></td>
            	<td>$<input type="text" name="vn_m_u" value="{{$country->VN_m}}"/></td>
            	<td>$<input type="text" name="vn_m_r" value="{{$country->VN_mr}}"/></td>
            </tr>
            <tr>
            	<td>70</td>
            	<td>Taiwan</td>
            	<td>$<input type="text" name="tw_d_u" value="{{$country->TW}}"/></td>
            	<td>$<input type="text" name="tw_d_r" value="{{$country->TW_r}}"/></td>
            	<td>$<input type="text" name="tw_m_u" value="{{$country->TW_m}}"/></td>
            	<td>$<input type="text" name="tw_m_r" value="{{$country->TW_mr}}"/></td>
            </tr>
            <tr>
            	<td>71</td>
            	<td>Guatemala</td>
            	<td>$<input type="text" name="gt_d_u" value="{{$country->GT}}"/></td>
            	<td>$<input type="text" name="gt_d_r" value="{{$country->GT_r}}"/></td>
            	<td>$<input type="text" name="gt_m_u" value="{{$country->GT_m}}"/></td>
            	<td>$<input type="text" name="gt_m_r" value="{{$country->GT_mr}}"/></td>
            </tr>
            <tr>
            	<td>72</td>
            	<td>China</td>
            	<td>$<input type="text" name="cn_d_u" value="{{$country->CN}}"/></td>
            	<td>$<input type="text" name="cn_d_r" value="{{$country->CN_r}}"/></td>
            	<td>$<input type="text" name="cn_m_u" value="{{$country->CN_m}}"/></td>
            	<td>$<input type="text" name="cn_m_r" value="{{$country->CN_mr}}"/></td>
            </tr>
            <tr>
            	<td>73</td>
            	<td>Cambodia</td>
            	<td>$<input type="text" name="kh_d_u" value="{{$country->KH}}"/></td>
            	<td>$<input type="text" name="kh_d_r" value="{{$country->KH_r}}"/></td>
            	<td>$<input type="text" name="kh_m_u" value="{{$country->KH_m}}"/></td>
            	<td>$<input type="text" name="kh_m_r" value="{{$country->KH_mr}}"/></td>
            </tr>
            <tr>
            	<td>74</td>
            	<td>Austria</td>
            	<td>$<input type="text" name="at_d_u" value="{{$country->AT}}"/></td>
            	<td>$<input type="text" name="at_d_r" value="{{$country->AT_r}}"/></td>
            	<td>$<input type="text" name="at_m_u" value="{{$country->AT_m}}"/></td>
            	<td>$<input type="text" name="at_m_r" value="{{$country->AT_mr}}"/></td>
            </tr>
            <tr>
            	<td>75</td>
            	<td>Slovakia</td>
            	<td>$<input type="text" name="sk_d_u" value="{{$country->SK}}"/></td>
            	<td>$<input type="text" name="sk_d_r" value="{{$country->SK_r}}"/></td>
            	<td>$<input type="text" name="sk_m_u" value="{{$country->SK_m}}"/></td>
            	<td>$<input type="text" name="sk_m_r" value="{{$country->SK_mr}}"/></td>
            </tr>
            <tr>
            	<td>76</td>
            	<td>Armenia</td>
            	<td>$<input type="text" name="am_d_u" value="{{$country->AM}}"/></td>
            	<td>$<input type="text" name="am_d_r" value="{{$country->AM_r}}"/></td>
            	<td>$<input type="text" name="am_m_u" value="{{$country->AM_m}}"/></td>
            	<td>$<input type="text" name="am_m_r" value="{{$country->AM_mr}}"/></td>
            </tr>
            <tr>
            	<td>77</td>
            	<td>Albania</td>
            	<td>$<input type="text" name="al_d_u" value="{{$country->AL}}"/></td>
            	<td>$<input type="text" name="al_d_r" value="{{$country->AL_r}}"/></td>
            	<td>$<input type="text" name="al_m_u" value="{{$country->AL_m}}"/></td>
            	<td>$<input type="text" name="al_m_r" value="{{$country->AL_mr}}"/></td>
            </tr>
            <tr>
            	<td>78</td>
            	<td>Macedonia, The Former Yugoslav Republic Of	</td>
            	<td>$<input type="text" name="mk_d_u" value="{{$country->MK}}"/></td>
            	<td>$<input type="text" name="mk_d_r" value="{{$country->MK_r}}"/></td>
            	<td>$<input type="text" name="mk_m_u" value="{{$country->MK_m}}"/></td>
            	<td>$<input type="text" name="mk_m_r" value="{{$country->MK_mr}}"/></td>
            </tr>
             <tr>
            	<td>79</td>
            	<td>Turkmenistan</td>
            	<td>$<input type="text" name="tm_d_u" value="{{$country->TM}}"/></td>
            	<td>$<input type="text" name="tm_d_r" value="{{$country->TM_r}}"/></td>
            	<td>$<input type="text" name="tm_m_u" value="{{$country->TM_m}}"/></td>
            	<td>$<input type="text" name="tm_m_r" value="{{$country->TM_mr}}"/></td>
            </tr>
            <tr>
            	<td>80</td>
            	<td>Lebanon</td>
            	<td>$<input type="text" name="lb_d_u" value="{{$country->LB}}"/></td>
            	<td>$<input type="text" name="lb_d_r" value="{{$country->LB_r}}"/></td>
            	<td>$<input type="text" name="lb_m_u" value="{{$country->LB_m}}"/></td>
            	<td>$<input type="text" name="lb_m_r" value="{{$country->LB_mr}}"/></td>
            </tr>
            <tr>
            	<td>81</td>
            	<td>Ecuador</td>
            	<td>$<input type="text" name="ec_d_u" value="{{$country->EC}}"/></td>
            	<td>$<input type="text" name="ec_d_r" value="{{$country->EC_r}}"/></td>
            	<td>$<input type="text" name="ec_m_u" value="{{$country->EC_m}}"/></td>
            	<td>$<input type="text" name="ec_m_r" value="{{$country->EC_mr}}"/></td>
            </tr>
            <tr>
            	<td>82</td>
            	<td>Philippines</td>
            	<td>$<input type="text" name="ph_d_u" value="{{$country->PH}}"/></td>
            	<td>$<input type="text" name="ph_d_r" value="{{$country->PH_r}}"/></td>
            	<td>$<input type="text" name="ph_m_u" value="{{$country->PH_m}}"/></td>
            	<td>$<input type="text" name="ph_m_r" value="{{$country->PH_mr}}"/></td>
            </tr>
            <tr>
            	<td>83</td>
            	<td>Hungary</td>
            	<td>$<input type="text" name="hu_d_u" value="{{$country->HU}}"/></td>
            	<td>$<input type="text" name="hu_d_r" value="{{$country->HU_r}}"/></td>
            	<td>$<input type="text" name="hu_m_u" value="{{$country->HU_m}}"/></td>
            	<td>$<input type="text" name="hu_m_r" value="{{$country->HU_mr}}"/></td>
            </tr>
            <tr>
            	<td>84</td>
            	<td>Egypt</td>
            	<td>$<input type="text" name="eg_d_u" value="{{$country->EG}}"/></td>
            	<td>$<input type="text" name="eg_d_r" value="{{$country->EG_r}}"/></td>
            	<td>$<input type="text" name="eg_m_u" value="{{$country->EG_m}}"/></td>
            	<td>$<input type="text" name="eg_m_r" value="{{$country->EG_mr}}"/></td>
            </tr>
            <tr>
            	<td>85</td>
            	<td>Pakistan</td>
            	<td>$<input type="text" name="pk_d_u" value="{{$country->PK}}"/></td>
            	<td>$<input type="text" name="pk_d_r" value="{{$country->PK_r}}"/></td>
            	<td>$<input type="text" name="pk_m_u" value="{{$country->PK_m}}"/></td>
            	<td>$<input type="text" name="pk_m_r" value="{{$country->PK_mr}}"/></td>
            </tr>
            <tr>
            	<td>86</td>
            	<td>Cameroon</td>
            	<td>$<input type="text" name="cm_d_u" value="{{$country->CM}}"/></td>
            	<td>$<input type="text" name="cm_d_r" value="{{$country->CM_r}}"/></td>
            	<td>$<input type="text" name="cm_m_u" value="{{$country->CM_m}}"/></td>
            	<td>$<input type="text" name="cm_m_r" value="{{$country->CM_mr}}"/></td>
            </tr>
            <tr>
            	<td>87</td>
            	<td>Ukraine</td>
            	<td>$<input type="text" name="ua_d_u" value="{{$country->UA}}"/></td>
            	<td>$<input type="text" name="ua_d_r" value="{{$country->UA_r}}"/></td>
            	<td>$<input type="text" name="ua_m_u" value="{{$country->UA_m}}"/></td>
            	<td>$<input type="text" name="ua_m_r" value="{{$country->UA_mr}}"/></td>
            </tr>
            <tr>
            	<td>88</td>
            	<td>Bermuda</td>
            	<td>$<input type="text" name="bm_d_u" value="{{$country->BM}}"/></td>
            	<td>$<input type="text" name="bm_d_r" value="{{$country->BM_r}}"/></td>
            	<td>$<input type="text" name="bm_m_u" value="{{$country->BM_m}}"/></td>
            	<td>$<input type="text" name="bm_m_r" value="{{$country->BM_mr}}"/></td>
            </tr>
             <tr>
            	<td>89</td>
            	<td>New Caledonia</td>
            	<td>$<input type="text" name="nc_d_u" value="{{$country->NC}}"/></td>
            	<td>$<input type="text" name="nc_d_r" value="{{$country->NC_r}}"/></td>
            	<td>$<input type="text" name="nc_m_u" value="{{$country->NC_m}}"/></td>
            	<td>$<input type="text" name="nc_m_r" value="{{$country->NC_mr}}"/></td>
            </tr>
            <tr>
            	<td>90</td>
            	<td>Libya</td>
            	<td>$<input type="text" name="ly_d_u" value="{{$country->LY}}"/></td>
            	<td>$<input type="text" name="ly_d_r" value="{{$country->LY_r}}"/></td>
            	<td>$<input type="text" name="ly_m_u" value="{{$country->LY_m}}"/></td>
            	<td>$<input type="text" name="ly_m_r" value="{{$country->LY_mr}}"/></td>
            </tr>
            <tr>
            	<td>91</td>
            	<td>Argentina</td>
            	<td>$<input type="text" name="ar_d_u" value="{{$country->AR}}"/></td>
            	<td>$<input type="text" name="ar_d_r" value="{{$country->AR_r}}"/></td>
            	<td>$<input type="text" name="ar_m_u" value="{{$country->AR_m}}"/></td>
            	<td>$<input type="text" name="ar_m_r" value="{{$country->AR_mr}}"/></td>
            </tr>
            <tr>
            	<td>92</td>
            	<td>Hong Kong</td>
            	<td>$<input type="text" name="hk_d_u" value="{{$country->HK}}"/></td>
            	<td>$<input type="text" name="hk_d_r" value="{{$country->HK_r}}"/></td>
            	<td>$<input type="text" name="hk_m_u" value="{{$country->HK_m}}"/></td>
            	<td>$<input type="text" name="hk_m_r" value="{{$country->HK_mr}}"/></td>
            </tr>
            <tr>
            	<td>93</td>
            	<td>Turkey</td>
            	<td>$<input type="text" name="tr_d_u" value="{{$country->TR}}"/></td>
            	<td>$<input type="text" name="tr_d_r" value="{{$country->TR_r}}"/></td>
            	<td>$<input type="text" name="tr_m_u" value="{{$country->TR_m}}"/></td>
            	<td>$<input type="text" name="tr_m_r" value="{{$country->TR_mr}}"/></td>
            </tr>
            <tr>
            	<td>94</td>
            	<td>Algeria</td>
            	<td>$<input type="text" name="dz_d_u" value="{{$country->DZ}}"/></td>
            	<td>$<input type="text" name="dz_d_r" value="{{$country->DZ_r}}"/></td>
            	<td>$<input type="text" name="dz_m_u" value="{{$country->DZ_m}}"/></td>
            	<td>$<input type="text" name="dz_m_r" value="{{$country->DZ_mr}}"/></td>
            </tr>
            <tr>
            	<td>95</td>
            	<td>Romania</td>
            	<td>$<input type="text" name="ro_d_u" value="{{$country->RO}}"/></td>
            	<td>$<input type="text" name="ro_d_r" value="{{$country->RO_r}}"/></td>
            	<td>$<input type="text" name="ro_m_u" value="{{$country->RO_m}}"/></td>
            	<td>$<input type="text" name="ro_m_r" value="{{$country->RO_mr}}"/></td>
            </tr>
            <tr>
            	<td>96</td>
            	<td>Bahamas</td>
            	<td>$<input type="text" name="bs_d_u" value="{{$country->BS}}"/></td>
            	<td>$<input type="text" name="bs_d_r" value="{{$country->BS_r}}"/></td>
            	<td>$<input type="text" name="bs_m_u" value="{{$country->BS_m}}"/></td>
            	<td>$<input type="text" name="bs_m_r" value="{{$country->BS_mr}}"/></td>
            </tr>
            <tr>
            	<td>97</td>
            	<td>Greenland</td>
            	<td>$<input type="text" name="gl_d_u" value="{{$country->GL}}"/></td>
            	<td>$<input type="text" name="gl_d_r" value="{{$country->GL_r}}"/></td>
            	<td>$<input type="text" name="gl_m_u" value="{{$country->GL_m}}"/></td>
            	<td>$<input type="text" name="gl_m_r" value="{{$country->GL_mr}}"/></td>
            </tr>
            <tr>
            	<td>98</td>
            	<td>Liberia</td>
            	<td>$<input type="text" name="lr_d_u" value="{{$country->LR}}"/></td>
            	<td>$<input type="text" name="lr_d_r" value="{{$country->LR_r}}"/></td>
            	<td>$<input type="text" name="lr_m_u" value="{{$country->LR_m}}"/></td>
            	<td>$<input type="text" name="lr_m_r" value="{{$country->LR_mr}}"/></td>
            </tr>
             <tr>
            	<td>99</td>
            	<td>Saint Martin</td>
            	<td>$<input type="text" name="mf_d_u" value="{{$country->MF}}"/></td>
            	<td>$<input type="text" name="mf_d_r" value="{{$country->MF_r}}"/></td>
            	<td>$<input type="text" name="mf_m_u" value="{{$country->MF_m}}"/></td>
            	<td>$<input type="text" name="mf_m_r" value="{{$country->MF_mr}}"/></td>
            </tr>
            <tr>
            	<td>100</td>
            	<td>Bhutan</td>
            	<td>$<input type="text" name="bt_d_u" value="{{$country->BT}}"/></td>
            	<td>$<input type="text" name="bt_d_r" value="{{$country->BT_r}}"/></td>
            	<td>$<input type="text" name="bt_m_u" value="{{$country->BT_m}}"/></td>
            	<td>$<input type="text" name="bt_m_r" value="{{$country->BT_mr}}"/></td>
            </tr>
            <tr>
            	<td>101</td>
            	<td>French Guiana</td>
            	<td>$<input type="text" name="gf_d_u" value="{{$country->GF}}"/></td>
            	<td>$<input type="text" name="gf_d_r" value="{{$country->GF_r}}"/></td>
            	<td>$<input type="text" name="gf_m_u" value="{{$country->GF_m}}"/></td>
            	<td>$<input type="text" name="gf_m_r" value="{{$country->GF_mr}}"/></td>
            </tr>
            <tr>
            	<td>102</td>
            	<td>Nepal</td>
            	<td>$<input type="text" name="np_d_u" value="{{$country->NP}}"/></td>
            	<td>$<input type="text" name="np_d_r" value="{{$country->NP_r}}"/></td>
            	<td>$<input type="text" name="np_m_u" value="{{$country->NP_m}}"/></td>
            	<td>$<input type="text" name="np_m_r" value="{{$country->NP_mr}}"/></td>
            </tr>
            <tr>
            	<td>103</td>
            	<td>Afghanistan</td>
            	<td>$<input type="text" name="af_d_u" value="{{$country->AF}}"/></td>
            	<td>$<input type="text" name="af_d_r" value="{{$country->AF_r}}"/></td>
            	<td>$<input type="text" name="af_m_u" value="{{$country->AF_m}}"/></td>
            	<td>$<input type="text" name="af_m_r" value="{{$country->AF_mr}}"/></td>
            </tr>
            <tr>
            	<td>104</td>
            	<td>Cuba</td>
            	<td>$<input type="text" name="cu_d_u" value="{{$country->CU}}"/></td>
            	<td>$<input type="text" name="cu_d_r" value="{{$country->CU_r}}"/></td>
            	<td>$<input type="text" name="cu_m_u" value="{{$country->CU_m}}"/></td>
            	<td>$<input type="text" name="cu_m_r" value="{{$country->CU_mr}}"/></td>
            </tr>
            
            	<td>105</td>
            	<td>El Salvador</td>
            	<td>$<input type="text" name="sv_d_u" value="{{$country->SV}}"/></td>
            	<td>$<input type="text" name="sv_d_r" value="{{$country->SV_r}}"/></td>
            	<td>$<input type="text" name="sv_m_u" value="{{$country->SV_m}}"/></td>
            	<td>$<input type="text" name="sv_m_r" value="{{$country->SV_mr}}"/></td>
            </tr>
            <tr>
            	<td>106</td>
            	<td>San Marino</td>
            	<td>$<input type="text" name="sm_d_u" value="{{$country->SM}}"/></td>
            	<td>$<input type="text" name="sm_d_r" value="{{$country->SM_r}}"/></td>
            	<td>$<input type="text" name="sm_m_u" value="{{$country->SM_m}}"/></td>
            	<td>$<input type="text" name="sm_m_r" value="{{$country->SM_mr}}"/></td>
            </tr>
            <tr>
                  <td>107</td>
                  <td>Other Countries</td>
                  <td>$<input type="text" name="others_d_u" value="{{$country->others}}"/></td>
                  <td>$<input type="text" name="others_d_r" value="{{$country->others_r}}"/></td>
                  <td>$<input type="text" name="others_m_u" value="{{$country->others_m}}"/></td>
                  <td>$<input type="text" name="others_m_r" value="{{$country->others_mr}}"/></td>
            </tr>
            {{csrf_field()}}
            
        </tbody>
    </table>
<button class="btn btn-success" type="submit">Submit</button>            </form>
</div>

<style type="text/css">
	input{

		border:1px solid black;
		width: 52px;


	}
</style>

@endsection