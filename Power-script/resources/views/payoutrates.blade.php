@extends('layouts.master') 
@section('title','Payout Rates') 
@section('content') @if($country)

<script type="text/javascript" src="https://kryogenix.org/code/browser/sorttable/sorttable.js"></script>
<h6 class="payout"> Unique = average amount paid for 1000 visitors in the 24-hour period. </h6>

<h6 class="payout">Raw = average amount paid on the 1st advert view for 1000 link views in the 24-hour period. </h6>
<div class="card z-depth-2 payout" style="overflow-x:auto;">

    <table class="sortable">
        <thead class="sortable cyan white-text" >
            <th>ID</th>
            <th>Country <i class="fa fa-globe" aria-hidden="true"></i></th>
            <th>Unique <i class="fa fa-desktop" aria-hidden="true"></i></th>
            <th>Raw <i class="fa fa-desktop" aria-hidden="true"></i></th>
            <th>Unique <i class="fa fa-mobile" aria-hidden="true"></i></th>
            <th>Raw <i class="fa fa-mobile" aria-hidden="true"></i></th>
        </thead>

        <tbody>

            <tr>
                <td>1</td>
                <td>United States</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">$ {{$country->US}}</a></td>
                <td><a class="btn btn-waves hoverable z-depth-3 green"> $ {{$country->US_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green"> ${{$country->US_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green"> ${{$country->US_mr}}</a> </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Canada</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->CA}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->CA_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->CA_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->CA_mr}} </a></td>
            </tr>
            <tr>
                <td>3</td>
                <td>United Kingdom</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->GB}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->GB_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->GB_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->GB_mr}}</a> </td>
            </tr>
            <tr>
                <td>4</td>
                <td>Austrilia</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->AU}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->AU_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->AU_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->AU_mr}}</a> </td>
            </tr>
            <tr>
                <td>5</td>
                <td>Germany</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->DE}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->DE_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->DE_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->DE_mr}}</a> </td>
            </tr>
            <tr>
                <td>6</td>
                <td>Norway</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->NO}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->NO_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->NO_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->NO_mr}}</a> </td>
            </tr>
            <tr>
                <td>7</td>
                <td>United Arab emirates</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->AE}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->AE_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->AE_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->AE_mr}}</a> </td>
            </tr>
            <tr>
                <td>8</td>
                <td>Sweden</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->SE}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->SE_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->SE_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->SE_mr}}</a> </td>
            </tr>
            <tr>
                <td>9</td>
                <td>South Arfica</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->ZA}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->ZA_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->ZA_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->ZA_mr}}</a> </td>
            </tr>
            <tr>
                <td>10</td>
                <td>Finland</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->FI}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->FI_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->FI_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->FI_mr}}</a> </td>
            </tr>
            <tr>
                <td>11</td>
                <td>Denmark</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->DK}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->DK_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->DK_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->DK_mr}}</a> </td>
            </tr>
            <tr>
                <td>12</td>
                <td>Newzeland</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->NZ}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->NZ_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->NZ_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->NZ_mr}}</a> </td>
            </tr>
            <tr>
                <td>13</td>
                <td>Poland</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->PL}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->PL_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->PL_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->PL_mr}}</a> </td>
            </tr>
            <tr>
                <td>14</td>
                <td>Ireland</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->IE}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->IE_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->IE_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->IE_mr}}</a> </td>
            </tr>
            <tr>
                <td>15</td>
                <td>Switzerland</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->CH}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->CH_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->CH_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->CH_mr}}</a> </td>
            </tr>
            <tr>
                <td>16</td>
                <td>Kuwait</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->KW}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->KW_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->KW_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->KW_mr}}</a> </td>
            </tr>
            <tr>
                <td>17</td>
                <td>Qatar</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->QA}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->QA_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->QA_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->QA_mr}}</a> </td>
            </tr>
            <tr>
                <td>18</td>
                <td>Saudi Arabia</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->SA}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->SA_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->SA_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->SA_mr}}</a> </td>
            </tr>
            <tr>
                <td>19</td>
                <td>Belgium</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->BE}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->BE_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->BE_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->BE_mr}}</a> </td>
            </tr>
            <tr>
                <td>20</td>
                <td>Spain</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->ES}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->ES_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->ES_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->ES_mr}}</a> </td>
            </tr>
            <tr>
                <td>21</td>
                <td>Korea, Republic Of</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->KR}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->KR_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->KR_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->KR_mr}}</a> </td>
            </tr>
            <tr>
                <td>22</td>
                <td>Oman</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->OM}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->OM_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->OM_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->OM_mr}}</a> </td>
            </tr>
            <tr>
                <td>23</td>
                <td>Cyprus</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->CY}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->CY_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->CY_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->CY_mr}}</a> </td>
            </tr>
            <tr>
                <td>24</td>
                <td>Netherlands</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->NL}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->NL_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->NL_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->NL_mr}}</a> </td>
            </tr>
            <tr>
                <td>25</td>
                <td>Czech Republic</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->CZ}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->CZ_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->CZ_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->CZ_mr}}</a> </td>
            </tr>
            <tr>
                <td>26</td>
                <td>Iceland</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->IS}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->IS_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->IS_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->IS_mr}}</a> </td>
            </tr>
            <tr>
                <td>27</td>
                <td>Luxembourg</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->LU}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->LU_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->LU_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->LU_mr}}</a> </td>
            </tr>
            <tr>
                <td>28</td>
                <td>Greece</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->GR}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->GR_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->GR_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->GR_mr}}</a> </td>
            </tr>
            <tr>
                <td>29</td>
                <td>France</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->FR}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->FR_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->FR_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->FR_mr}}</a> </td>
            </tr>
            <tr>
                <td>30</td>
                <td>Singapore</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->SG}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->SG_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->SG_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->SG_mr}}</a> </td>
            </tr>

            <tr>
                <td>31</td>
                <td>Israel</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->IL}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->IL_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->IL_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->IL_mr}}</a> </td>
            </tr>
            <tr>
                <td>32</td>
                <td>Japan</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->JP}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->JP_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->JP_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->JP_mr}}</a> </td>
            </tr>
            <tr>
                <td>33</td>
                <td>Malaysia</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->MY}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->MY_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->MY_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->MY_mr}}</a> </td>
            </tr>
            <tr>
                <td>34</td>
                <td>Nigeria</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->NG}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->NG_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->NG_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->NG_mr}}</a> </td>
            </tr>
            <tr>
                <td>35</td>
                <td>Portugal</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->PT}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->PT_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->PT_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->PT_mr}}</a> </td>
            </tr>
            <tr>
                <td>36</td>
                <td>Iraq</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->IQ}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->IQ_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->IQ_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->IQ_mr}}</a> </td>
            </tr>
            <tr>
                <td>37</td>
                <td>Latvia</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->LV}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->LV_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->LV_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->LV_mr}}</a> </td>
            </tr>
            <tr>
                <td>38</td>
                <td>PALESTINIAN TERRITORY, OCCUPIED</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->PS}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->PS_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->PS_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->PS_mr}}</a> </td>
            </tr>
            <tr>
                <td>39</td>
                <td>Slovenia</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->SI}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->SI_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->SI_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->SI_mr}}</a> </td>
            </tr>
            <tr>
                <td>40</td>
                <td>Russian Federation</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->RU}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->RU_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->RU_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->RU_mr}}</a> </td>
            </tr>
            <tr>
                <td>41</td>
                <td>Bulgaria</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->BG}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->BG_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->BG_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->BG_mr}}</a> </td>
            </tr>
            <tr>
                <td>42</td>
                <td>Serbia</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->RS}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->RS_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->RS_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->RS_mr}}</a> </td>
            </tr>
            <tr>
                <td>43</td>
                <td>Montenegro</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->ME}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->ME_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->ME_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->ME_mr}}</a> </td>
            </tr>
            <tr>
                <td>44</td>
                <td>Thailand</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->TH}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->TH_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->TH_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->TH_mr}}</a> </td>
            </tr>
            <tr>
                <td>45</td>
                <td>Sri Lanka</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->LK}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->LK_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->LK_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->LK_mr}}</a> </td>
            </tr>
            <tr>
                <td>46</td>
                <td>Myanmar</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->MM}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->MM_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->MM_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->MM_mr}}</a> </td>
            </tr>
            <tr>
                <td>47</td>
                <td>Italy</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->IT}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->IT_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->IT_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->IT_mr}}</a> </td>
            </tr>
            <tr>
                <td>48</td>
                <td>Jordan</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->JO}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->JO_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->JO_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->JO_mr}}</a> </td>
            </tr>
            <tr>
                <td>49</td>
                <td>Kenya</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->KE}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->KE_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->KE_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->KE_mr}}</a> </td>
            </tr>
            <tr>
                <td>50</td>
                <td>Iran, Islamic Republic Of</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->IR}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->IR_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->IR_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->IR_mr}}</a> </td>
            </tr>
            <tr>
                <td>51</td>
                <td>Ghana</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->GH}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->GH_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->GH_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->GH_mr}}</a> </td>
            </tr>
            <tr>
                <td>52</td>
                <td>Panama</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->PA}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->PA_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->PA_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->PA_mr}}</a> </td>
            </tr>
            <tr>
                <td>53</td>
                <td>Macao</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->MO}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->MO_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->MO_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->MO_mr}}</a> </td>
            </tr>
            <tr>
                <td>54</td>
                <td>Kazakhstan</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->KZ}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->KZ_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->KZ_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->KZ_mr}}</a> </td>
            </tr>
            <tr>
                <td>55</td>
                <td>Bangladesh</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->BD}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->BD_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->BD_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->BD_mr}}</a> </td>
            </tr>
            <tr>
                <td>56</td>
                <td>Estonia</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->EE}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->EE_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->EE_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->EE_mr}}</a> </td>
            </tr>
            <tr>
                <td>57</td>
                <td>Lithuania</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->LT}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->LT_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->LT_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->LT_mr}}</a> </td>
            </tr>
            <tr>
                <td>58</td>
                <td>Georgia</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->GE}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->GE_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->GE_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->GE_mr}}</a> </td>
            </tr>
            <tr>
                <td>59</td>
                <td>Mexico</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->MX}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->MX_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->MX_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->MX_mr}}</a> </td>
            </tr>
            <tr>
                <td>60</td>
                <td>British Indian Ocean Territory</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->IO}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->IO_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->IO_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->IO_mr}}</a> </td>
            </tr>
            <tr>
                <td>61</td>
                <td>Moldova</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->MD}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->MD_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->MD_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->MD_mr}}</a> </td>
            </tr>
            <tr>
                <td>62</td>
                <td>Tanzania, United Republic Of</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->TZ}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->TZ_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->TZ_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->TZ_mr}}</a> </td>
            </tr>
            <tr>
                <td>63</td>
                <td>Indonesia</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->INDO}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->INDO_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->INDO_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->INDO_mr}}</a> </td>
            </tr>
            <tr>
                <td>64</td>
                <td>Cote D'ivoire</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->CI}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->CI_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->CI_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->CI_mr}}</a> </td>
            </tr>
            <tr>
                <td>65</td>
                <td>Brazil</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->BR}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->BR_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->BR_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->BR_mr}}</a> </td>
            </tr>
            <tr>
                <td>66</td>
                <td>Bosnia And Herzegovina</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->BA}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->BA_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->BA_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->BA_mr}}</a> </td>
            </tr>
            <tr>
                <td>67</td>
                <td>Lithuania</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->HN}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->HN_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->HN_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->HN_mr}}</a> </td>
            </tr>
            <tr>
                <td>68</td>
                <td>India</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->IN}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->IN_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->IN_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->IN_mr}}</a> </td>
            </tr>
            <tr>
                <td>69</td>
                <td>Vietnam</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->VN}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->VN_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->VN_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->VN_mr}}</a> </td>
            </tr>
            <tr>
                <td>70</td>
                <td>Taiwan</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->TW}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->TW_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->TW_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->TW_mr}}</a> </td>
            </tr>
            <tr>
                <td>71</td>
                <td>Guatemala</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->GT}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->GT_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->GT_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->GT_mr}}</a> </td>
            </tr>
            <tr>
                <td>72</td>
                <td>China</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->CN}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->CN_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->CN_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->CN_mr}}</a> </td>
            </tr>
            <tr>
                <td>73</td>
                <td>Cambodia</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->KH}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->KH_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->KH_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->KH_mr}}</a> </td>
            </tr>
            <tr>
                <td>74</td>
                <td>Austria</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->AT}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->AT_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->AT_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->AT_mr}}</a> </td>
            </tr>
            <tr>
                <td>75</td>
                <td>Slovakia</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->SK}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->SK_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->SK_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->SK_mr}}</a> </td>
            </tr>
            <tr>
                <td>76</td>
                <td>Armenia</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->AM}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->AM_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->AM_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->AM_mr}}</a> </td>
            </tr>
            <tr>
                <td>77</td>
                <td>Albania</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->AL}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->AL_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->AL_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->AL_mr}}</a> </td>
            </tr>
            <tr>
                <td>78</td>
                <td>Macedonia, The Former Yugoslav Republic Of </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->MK}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->MK_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->MK_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->MK_mr}}</a> </td>
            </tr>
            <tr>
                <td>79</td>
                <td>Turkmenistan</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->TM}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->TM_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->TM_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->TM_mr}}</a> </td>
            </tr>
            <tr>
                <td>80</td>
                <td>Lebanon</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->LB}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->LB_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->LB_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->LB_mr}}</a> </td>
            </tr>
            <tr>
                <td>81</td>
                <td>Ecuador</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->EC}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->EC_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->EC_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->EC_mr}}</a> </td>
            </tr>
            <tr>
                <td>82</td>
                <td>Philippines</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->PH}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->PH_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->PH_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->PH_mr}}</a> </td>
            </tr>
            <tr>
                <td>83</td>
                <td>Hungary</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->HU}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->HU_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->HU_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->HU_mr}}</a> </td>
            </tr>
            <tr>
                <td>84</td>
                <td>Egypt</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->EG}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->EG_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->EG_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->EG_mr}}</a> </td>
            </tr>
            <tr>
                <td>85</td>
                <td>Pakistan</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->PK}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->PK_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->PK_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->PK_mr}}</a> </td>
            </tr>
            <tr>
                <td>86</td>
                <td>Cameroon</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->CM}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->CM_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->CM_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->CM_mr}}</a> </td>
            </tr>
            <tr>
                <td>87</td>
                <td>Ukraine</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->UA}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->UA_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->UA_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->UA_mr}}</a> </td>
            </tr>
            <tr>
                <td>88</td>
                <td>Bermuda</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->BM}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->BM_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->BM_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->BM_mr}}</a> </td>
            </tr>
            <tr>
                <td>89</td>
                <td>New Caledonia</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->NC}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->NC_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->NC_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->NC_mr}}</a> </td>
            </tr>
            <tr>
                <td>90</td>
                <td>Libya</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->LY}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->LY_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->LY_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->LY_mr}}</a> </td>
            </tr>
            <tr>
                <td>91</td>
                <td>Argentina</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->AR}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->AR_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->AR_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->AR_mr}}</a> </td>
            </tr>
            <tr>
                <td>92</td>
                <td>Hong Kong</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->HK}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->HK_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->HK_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->HK_mr}}</a> </td>
            </tr>
            <tr>
                <td>93</td>
                <td>Turkey</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->TR}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->TR_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->TR_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->TR_mr}}</a> </td>
            </tr>
            <tr>
                <td>94</td>
                <td>Algeria</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->DZ}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->DZ_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->DZ_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->DZ_mr}}</a> </td>
            </tr>
            <tr>
                <td>95</td>
                <td>Romania</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->RO}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->RO_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->RO_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->RO_mr}}</a> </td>
            </tr>
            <tr>
                <td>96</td>
                <td>Bahamas</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->BS}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->BS_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->BS_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->BS_mr}}</a> </td>
            </tr>
            <tr>
                <td>97</td>
                <td>Greenland</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->GL}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->GL_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->GL_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->GL_mr}}</a> </td>
            </tr>
            <tr>
                <td>98</td>
                <td>Liberia</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->LR}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->LR_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->LR_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->LR_mr}}</a> </td>
            </tr>
            <tr>
                <td>99</td>
                <td>Saint Martin</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->MF}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->MF_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->MF_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->MF_mr}}</a> </td>
            </tr>
            <tr>
                <td>100</td>
                <td>Bhutan</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->BT}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->BT_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->BT_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->BT_mr}}</a> </td>
            </tr>
            <tr>
                <td>101</td>
                <td>French Guiana</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->GF}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->GF_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->GF_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->GF_mr}}</a> </td>
            </tr>
            <tr>
                <td>102</td>
                <td>Nepal</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->NP}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->NP_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->NP_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->NP_mr}}</a> </td>
            </tr>
            <tr>
                <td>103</td>
                <td>Afghanistan</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->AF}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->AF_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->AF_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->AF_mr}}</a> </td>
            </tr>
            <tr>
                <td>104</td>
                <td>Cuba</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->CU}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->CU_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->CU_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->CU_mr}}</a> </td>
            </tr>

            <td>105</td>
            <td>El Salvador</td>
            <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->SV}}</a> </td>
            <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->SV_r}}</a> </td>
            <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->SV_m}}</a> </td>
            <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->SV_mr}}</a> </td>
            </tr>
            <tr>
                <td>106</td>
                <td>San Marino</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->SM}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->SM_r}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->SM_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green">${{$country->SM_mr}}</a> </td>
            </tr>
            <tr>
                <td>107</td>
                <td>Other Countries</td>
                <td><a class="btn btn-waves hoverable z-depth-3 green"> $ {{$country->others}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green"> $ {{$country->others_r}}</a></td>
                <td><a class="btn btn-waves hoverable z-depth-3 green"> $ {{$country->others_m}}</a> </td>
                <td><a class="btn btn-waves hoverable z-depth-3 green"> $ {{$country->others_mr}}</a> </td>
            </tr>

        </tbody>
    </table>

</div>
@endif

<style>
    table {
        padding: 2%;
    }
    
    .payout {
        margin-left: 3%;
        margin-right: 3%;
        margin-top: 3%;
        height: 100%;
    }
    
    table,
    th,
    td {
        border: 1px solid black;
    }
</style>

@endsection