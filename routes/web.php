<?php

Route::get('/', 'MensagemController@carregarFormulario');
Route::post('/salvarmensagem','MensagemController@salvarNovaMensagem');