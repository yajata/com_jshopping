<?php
/**
* @package Joomla
* @subpackage JoomShopping
* @author Nevigen.com
* @website https://nevigen.com/
* @email support@nevigen.com
* @copyright Copyright © Nevigen.com. All rights reserved.
* @license Proprietary. Copyrighted Commercial Software
* @license agreement https://nevigen.com/license-agreement.html
**/

defined('_JEXEC') or die;

define('_JSHOP_SM_EDOST', 'eDost');
define('_JSHOP_SM_EDOST_WRONG_LICENSE_KEY', 'Неверный лицензионный ключ');
define('_JSHOP_SM_EDOST_AUTO_CALC_PRICES', 'Стоимость доставки расчитывается автоматически');
define('_JSHOP_SM_EDOST_WITH_INSURANCE', 'со страховкой');
define('_JSHOP_SM_EDOST_ID', 'Идентификатор магазина');
define('_JSHOP_SM_EDOST_ID_DESC', 'Идентификатор магазина из Личного кабинета на сайте edost.ru');
define('_JSHOP_SM_EDOST_PASS', 'Пароль магазина');
define('_JSHOP_SM_EDOST_PASS_DESC', 'Пароль для доступа к серверу расчетов из Личного кабинета на сайте edost.ru');
define('_JSHOP_SM_EDOST_CACHE', 'Кеширование результатов');
define('_JSHOP_SM_EDOST_CACHE_DESC', 'Кешировать или нет результаты рассчета калькулятора eDost. Сайт edost.ru имеет ограничение 400 расчетов в сутки. Для того, чтобы при одинаковых данных для расчета не происходил повторный расчет, кеширование должно быть включено. Однако в некоторых случаях на время тестирования модуля вам возможно понадобится его выключить.');
define('_JSHOP_SM_EDOST_CURRENCY', 'Валюта');
define('_JSHOP_SM_EDOST_CURRENCY_DESC', 'Поскольку eDost позволяет работать только с валютой Российский рубль, необходимо выбрать валюту, которая соотвествует российскому рублю.');
define('_JSHOP_SM_EDOST_CASH_ON_DELIVERY', 'Наложенный платеж');
define('_JSHOP_SM_EDOST_CASH_ON_DELIVERY_DESC', 'Если клиент выберет этот метод оплаты, стоимость доставки будет расчитана с учетом наложенного платежа. Если вы не используете наложенный платеж, оставьте это поле невыбранным. Обратите внимание, что не все транспортные компании работают с наложенным платежом, поэтому возможно некоторые способы доставки будут недоступны.');
define('_JSHOP_SM_EDOST_HIDE_EMPTY', 'Скрывать неактивный');
define('_JSHOP_SM_EDOST_HIDE_EMPTY_DESC', 'Скрывать метод доставки eDost, если выбран неверный адрес доставки либо произошла любая другая ошибка при рассчете стоимости доставки');
define('_JSHOP_SM_EDOST_CALC_EMPTY_WEIGHT', 'Расчет доставки без веса');
define('_JSHOP_SM_EDOST_CALC_EMPTY_WEIGHT_DESC', 'Параметр определяет, будет ли плагин расчитывать доставку, если хотя бы одному товару в заказе не задан вес. Если выбрано да, недостающий вес будет установлен как минимально возможный вес для расчета');
define('_JSHOP_SM_EDOST_PICKPOINT_FIELD', 'Поле пачкомата');
define('_JSHOP_SM_EDOST_PICKPOINT_FIELD_DESC', 'Если вы хотите использовать пачкоматы PickPoint или CDEK, необходимо выбрать поле для сохранения пункта выдачи. Для этого поля строго необходимо должно быть включено Показать и отключено Обязательно в настройках полей адреса JoomShopping');
define('_JSHOP_SM_EDOST_L', 'Длина');
define('_JSHOP_SM_EDOST_L_DESC', 'Характеристика, определяющая длину товара. Единица длины должна соотвествовать единице измерения габаритов в Личном кабинете на сайте eDost');
define('_JSHOP_SM_EDOST_W', 'Ширина');
define('_JSHOP_SM_EDOST_W_DESC', 'Характеристика, определяющая ширину товара. Единица ширины должна соотвествовать единице измерения габаритов в Личном кабинете на сайте eDost');
define('_JSHOP_SM_EDOST_H', 'Высота');
define('_JSHOP_SM_EDOST_H_DESC', 'Характеристика, определяющая высоту товара. Единица высоты должна соотвествовать единице измерения габаритов в Личном кабинете на сайте eDost');
define('_JSHOP_SM_EDOST_V', 'Объем');
define('_JSHOP_SM_EDOST_V_DESC', 'Характеристика, определяющая объем товара как строку с указанием одновременно длины, ширины и высоты. Будет использоваться, если не заданы характеристики определения длины, ширины и высоты. Например, "200х20х5 см", или "30*50*40". Единица объема должна соотвествовать единице измерения габаритов в Личном кабинете на сайте edost.ru');
define('_JSHOP_SM_EDOST_ERROR_PICKPOINT', 'Не выбран пункт выдачи');
define('_JSHOP_SM_EDOST_ERROR_XML', 'Ошибка при формировании XML');
define('_JSHOP_SM_EDOST_ERROR_2', 'Доступ к расчету заблокирован');
define('_JSHOP_SM_EDOST_ERROR_3', 'Неверные данные магазина (пароль или идентификатор)');
define('_JSHOP_SM_EDOST_ERROR_4', 'Неверные входные параметры');
define('_JSHOP_SM_EDOST_ERROR_5', 'Неверный город или страна');
define('_JSHOP_SM_EDOST_ERROR_6', 'Внутренняя ошибка сервера расчетов');
define('_JSHOP_SM_EDOST_ERROR_7', 'Не заданы компании доставки в настройках магазина');
define('_JSHOP_SM_EDOST_ERROR_8', 'Сервер расчета не отвечает');
define('_JSHOP_SM_EDOST_ERROR_9', 'Превышен лимит расчетов за день');
define('_JSHOP_SM_EDOST_ERROR_11', 'Не указан вес');
define('_JSHOP_SM_EDOST_ERROR_12', 'Не заданы данные магазина (пароль или идентификатор)');
define('_JSHOP_SM_EDOST_WARNING_1', 'Почтового отделения с указанным индексом не существует');
define('_JSHOP_SM_EDOST_WARNING_2', 'В вашем регионе нет почтового отделения с указанным индексом');
?>