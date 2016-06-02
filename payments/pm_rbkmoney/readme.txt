Инструкция по установке
1. Копируем папку pm_rbkmoney в components/com_jshopping/payments
2. Заходим в Components -> JoomShopping -> Options (administrator/index.php?option=com_jshopping&controller=payments) и добавляем новый способ оплаты. Заполняем форму: поля "Code", "Title" - значение "RBK Money", поле "Alias" - "pm_rbkmoney", поле "Type" - "Extended". Сохраняем. Далее переходим на вкладку "Config" и заполняем поля "Номер магазина", "Секретное слово", выставляем статусы заказа. Копируем Url для уведомления.
3. В личном кабинете RBK Money прописываем Url для уведомления в поле "Оповещение о платеже".

PS. В некоторых случаях нет возможности указать в настройках "Type - Extended". Из-за этого не осуществляется переход на страницу оплаты. В этом случае надо вручную внести изменения в базу данных: в таблице jshopping_payment_method значение столбца payment_type изменить на "2". 