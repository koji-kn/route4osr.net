'use strict';{
   //モーダルウィンドウ
   $('.c-modal__item  img').click(function(){
    //クリックした画像をhtml（imgタグ全体）をc-modal__maskにコピー
    $("#modalMask").html($(this).prop("outerHTML"));
    //そして、fadeInで表示する。
    $("#modalMask").fadeIn(200);
    return false;
  });

  // コース画像モーダル非表示イベント
  // モーダル画像背景 または 拡大画像そのものをクリックで発火
  $("#modalMask").click(function () {
    // 非表示にする
    $("#modalMask").fadeOut(200);
    return false;
  });

}


