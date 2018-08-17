{php: [
if (__CITY__ == 'spb' || __CITY__ == 'msk') {
$return_html = '
<h2 class="ym_h3">Доставка</h2>
<div id="map_delivery" style="width: 95%; height: 500px"></div>';
if (__CITY__ == 'spb') {
$return_html .= '<script src="js/map_spb.js"></script>';
}elseif (__CITY__ == 'msk') {
$return_html .= '<script src="js/map_msk.js"></script>';
}else{
$return_html .= '<script src="js/map_spb.js"></script>';
}
$return_html .= '<script src="js/map.js"></script>
<div class="ym_delivery">
    <div class="ym_clear">
        <div class="ym_col ym_first">
            <span class="heading_grey heading_h4">Адрес доставки</span>
            <div class="adress_form">Город:<span style="float:right;"><input name="fldCity" id="fldCity" placeholder="Город" type="text"/></span> </div>
            <div class="adress_form">Улица:<span style="float:right;"><input name="fldStreet" id="fldStreet" placeholder="Улица" type="text"/></span> </div>
            <div class="adress_form">Дом:<span style="float:right;"><input name="fldHouse" id="fldHouse" placeholder="Дом \ Офис" type="text"/></span> </div>
            <div class="adress_form">Парадная:<span style="float:right;"><input name="fldFront" id="fldFront" placeholder="Парадная" type="text"/></span> </div>
        </div></br>
        <div class="ym_col ym_col_cars">'.

            ((__CITY__ == 'spb') ?

            '<label>Тип авто-доставки </label>
            <select class="ym_select" name="frmCar" id="frmCar">
                <option value="2">Газель 0,5-1м³ 26-50 кг</option>'.
                ((__CITY__ != 'msk') ?
                '<option data-image="/template/img/ym_select1.png" value="1">Курьер до 0,5 м³ 25 кг</option>' :
                '<option data-image="/template/img/ym_select1.png" value="1">Курьер до 0,5 м³ 20 кг</option>')
                .'<option data-image="/template/img/ym_select2.png" value="2">Газель 0,5-1м³ 26-50 кг</option>
                <option data-image="/template/img/ym_select2.png" value="3">Газель 1-2 м³ 51-500 кг</option>
                <option data-image="/template/img/ym_select2.png" value="4">Газель 2-4 м³ 501-1000 кг</option>
                <option data-image="/template/img/ym_select2.png" value="5">Газель 4-7 м³ 1001-1500 кг</option>
                <option data-image="/template/img/ym_select3.png" value="6">Фура 8-23 м³ 1500-5000 кг</option>
            </select>'

            :

            '<label>Тип авто-доставки </label>
            <select class="ym_select" name="frmCar" id="frmCar" style="width:300px">
                <option value="2">Газель 11 - 600кг</option>'.
                ((__CITY__ != 'msk') ?
                '<option data-image="/template/img/ym_select1.png" value="1">Курьер 1 - 10кг</option>' :
                '<option data-image="/template/img/ym_select1.png" value="1">Курьер 1 - 20кг</option>')
                .'<option data-image="/template/img/ym_select2.png" value="2">Газель 11 - 600кг</option>
                <option data-image="/template/img/ym_select2.png" value="3">Газель 601 - 1000кг</option>
                <option data-image="/template/img/ym_select2.png" value="4">Газель 1001 - 1500кг</option>
                <option data-image="/template/img/ym_select3.png" value="5">Фура > 1500кг </option>
            </select>'

            )

            .'</div>
    </div><br>
    <div class="ym_clear">
        <div class="ym_starter">
            <button class="ym_calc ym_search_address">Рассчитать стоимость доставки</button>
            <div class="ym_cost_label">
                Стоимость доставки:
                <span>
						<span class="delivery_cost_in_form">'.( (__CITY__ == 'msk') ? 'рассчитывается менеджером индивидульно' : 'от 370р').'</span>
                    <!--<span class="rouble">Р</span>-->
					</span>
            </div>
        </div>
        <!--
        <br>
        <div class="ym_col ym_first">
        <h2>Подъем</h2>
            <label>Этаж</label>
            <input name="fldEtaj" id="fldEtaj" placeholder="1" type="text">
            <label>Вес (кг)</label>
            <input name="fldEtaj" id="fldEtaj" placeholder="1" type="text">
            <label>Объем (м^3)</label>
            <input name="fldEtaj" id="fldEtaj" placeholder="1" type="text">
            <div>
                <input type="checkbox" id="hide">
                <label class="checkobox" for="hide">Лифт</label>
            </div>
        <button class="ym_calc ym_search_address">Рассчитать стоимость Подъема</button>
        </div>-->

        <br><br>
    </div>
</div>
';
} else {
$return_html = '';
}

$return_html .= '<h2>Процедура заказа проста</h2>
<h3>Заказать</h3>
<ul>
    <li class="list_circ">По телефону +7 (812) 606-60-60</li>
    <li class="list_circ">Оформить заказ на сайте</li>
    <li class="list_circ">Заказать в нашем офисе</li>
</ul>
<h3>Получить</h3>
<ul>
    <li class="list_circ">Рассчитать стоимость доставки и заказать доставку</li>
    <li class="list_circ">Бесплатно забрать в нашем офисе</li>
    <li class="list_circ">Бесплатная доставка по СПБ при покупке от 15 тыс.руб.</li>
</ul>
<h3>Оплатить</h3>
<ul>
    <li class="list_circ">Безналичная оплата</li>
    <li class="list_circ">Наличная оплата</li>
    <li class="list_circ">Оплата банковской картой в офисе и онлайн</li>
</ul>
<br>
<div class="online-variants">
    <div class="online-variant">
        <div class="online-variant-label">Банковские карты</div>
        <div class="online-variant-img online-variant-bank"></div>
    </div>
    <div class="online-variant">
        <div class="online-variant-label">Электронные деньги</div>
        <div class="online-variant-img online-variant-emoney"></div>
    </div>
    <div class="online-variant">
        <div class="online-variant-label">Баланс телефона</div>
        <div class="online-variant-img online-variant-mob"></div>
    </div>
</div>
<!--<h2>Условия возврата и обмена товара</h2><h3>Уважаемые покупатели!</h3>Прежде чем оплатить товар, рассмотрите его и убедитесь в полном  соответствии заявленной комплектации, а также отсутствии внешних дефектов. Вы имеете право отказаться от покупки, если товар по определенным причинам не устраивает вас.<br><p>Обмен и возврат продукции надлежащего качества происходит по следующим правилам:</p><ul><li type="square">Согласно п.4 ст.26.1 закона «О защите прав потребителей» покупатель имеет право отказаться от товара в течение семи дней после его передачи. Возврат и обмен продукции надлежащего качества возможен в том случае, если сохранены его товарный вид, потребительские свойства и документ, подтверждающий покупку и ее условия. Однако покупатель не может отказаться от товара, имеющего индивидуально-определенные свойства, если его может использовать исключительно приобретающий его потребитель.</li><li type="square">Для обмена или возврата товара необходимо оформить соответствующее заявление, которое рассматривается в срок до 10 дней (ст.22 закона «О защите прав потребителей»). В этот период с вами свяжется специалист для подробного обсуждения и решения вопроса.</li><li type="square">Принимая товар, потребитель должен помнить, что «риск случайной гибели или случайного повреждения товара переходит на покупателя  с момента, когда в соответствии с законом или договором продавец считается исполнившим  свою обязанность по передаче товара покупателю».(ст.459 Гражданского кодекса РФ). </li></ul><p>Обмен и возврат продукции ненадлежащего качества происходит по следующим правилам:</p><ul><li type="circle">При возникновении любых неполадок, связанных с использованием товара, необходимо внимательно ознакомиться с инструкцией и убедиться в его правильной эксплуатации. В специальный раздел  инструкции обычно перечислены типичные проблемы и способы их решения</li><li type="circle">Согласно ст.18 закона «О защите прав потребителей» товар ненадлежащего качества, имеющий внешние повреждения либо не соответствующий комплектации, обмену и возврату не подлежит</li><li type="circle">Обмен товара ненадлежащего качества происходит только после заключения авторизованного сервисного центра (адрес и номер телефона указаны в гарантийном талоне). Доставку не крупногабаритного груза до 5 кг до сервисного центра и обратно выполняет сам покупатель</li><li type="circle">На основании заключения сервисного центра происходит обмен товара на аналогичный либо возврат уплаченной суммы. Если же в заключении указано, что дефекты товара возникли по вине покупателя, то он обязан возместить расходы, связанные с проведение экспертизы (ст.18 закона «О защите прав потребителя») </li>  <li type="circle">Обмен или возврат товара со скрытым производственным дефектом, обнаруженным при эксплуатации, производится на основании и в сроки, установленные законодательством (закон «О защите прав потребителей», постановление правительства РФ «Об утверждении правил продажи товаров дистанционным способом» (ред. от 04.10.2012 г.)</li><li type="circle">Возможен обмен или возврат товара с заводским дефектом  при наличии заявления и соответствующего заключения сервисного центра.</li> </ul> <!-- <tr> <td> <h3>Получаю</h3> <ul> <li>Рассчитать стоимость доставки и заказать доставку</li> <li>Бесплатно забрать в нашем офисе</li> <li>Бесплатная доставка по Санкт-Петербургу осуществляется<br> при единовременной покупке от 15 000 рублей.</li> <li>Курьерская доставка</li> <ul> </td> </tr> <tr> <td> <h3>Оплачиваю</h3><ul> <li>безналичная оплата</li> <li>наличная оплата</li> <li>оплата банковской картой</li> </ul> </td> </tr> За более конкретной информацией о способах оплаты и доставки обращайтесь к менеджеру.  Сначала Вам нужно позвонить в компанию, сделать заказ, продиктовав реквизиты Вашей компании.  После чего менеджер выставляет счет и согласовывает заказ. После получения счета от менеджера вы оплачиваете покупку.  Как удобнее это сделать, решать только Вам (наличными, банковской пластиковой картой, банковской квитанцией, через платежные терминалы и другие способы).  Отличие в процессе оплаты между физическими и юридическими лицами только в том, что первые не предоставляют какие-либо реквизиты, а вторые, соответственно, предоставляют.  Остановиться на выборе способа доставки можно в процессе формирования заказа. Купленный Вами товар, Вы можете забрать со склада компании самостоятельно (самовывоз),   а также оформить доставку. Выбирать Вам, какая доставка окажется предпочтительнее. Бесплатная доставка по Санкт-Петербургу осуществляется при единовременной покупке от 15 000 рублей. За более конкретной информацией о способах оплаты и доставки обращайтесь к менеджеру. -->';]}