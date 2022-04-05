(() => {
    const startButton = document.querySelector('#get-started'); 
    const Category2 = document.getElementById('category-2');
    const Category3 = document.getElementById('category-3');
    const Category4 = document.getElementById('category-4');
    const Category5 = document.getElementById('category-5');
    const Category6 = document.getElementById('category-6');
    const Category7 = document.getElementById('category-7');
    const SearchButton = document.getElementById('js-search-button');
    console.log(SearchButton);


    const select1 = document.querySelector('[name="leaf_attachment"]');
    select1.onchange = event => {
        Category2.scrollIntoView(true);
    }
    const select2 = document.querySelector('[name="leaf_pattern"]');
    select2.onchange = event => {
        Category3.scrollIntoView(true);
    }
    const select3 = document.querySelector('[name="leaf_shape"]');
    select3.onchange = event => {
        Category4.scrollIntoView(true);
    }
    const select4 = document.querySelector('[name="leaf_blade"]');
    select4.onchange = event => {
        Category5.scrollIntoView(true);
    }
    const select5 = document.querySelector('[name="leaf_edge"]');
    select5.onchange = event => {
        Category6.scrollIntoView(true);
    }
    const select6 = document.querySelector('[name="leaf_vein"]');
    select6.onchange = event => {
        Category7.scrollIntoView(true);
    }
    const select7 = document.querySelector('[name="leaf_lateral_vein"]');
    select7.onchange = event => {
        SearchButton.scrollIntoView(true);
    }

    const PageTopBtn = document.getElementById('js-scroll-top');
    
    PageTopBtn.addEventListener('click', () =>{
        window.scrollTo({
            top: 0,
        });
    });

    function confirmForm() {
        return alert('Are you want to submit the form?');
    }

    $(function () {
        searchWord = function(){
          var searchResult,
              searchText = $(this).val(), // 検索ボックスに入力された値
              targetText,
              hitNum;
      
          // 検索結果を格納するための配列を用意
          searchResult = [];
      
          // 検索結果エリアの表示を空にする
          $('#search-result__list').empty();
          $('.search-result__hit-num').empty();
      
          // 検索ボックスに値が入ってる場合
          if (searchText != '') {
            $('.target-area li').each(function() {
              targetText = $(this).text();
      
              // 検索対象となるリストに入力された文字列が存在するかどうかを判断
              if (targetText.indexOf(searchText) != -1) {
                // 存在する場合はそのリストのテキストを用意した配列に格納
                searchResult.push(targetText);
              }
            });
      
            // 検索結果をページに出力
            for (var i = 0; i < searchResult.length; i ++) {
              $('<span>').text(searchResult[i]).appendTo('#search-result__list');
            }
      
            // ヒットの件数をページに出力
            hitNum = '<span>検索結果</span>：' + searchResult.length + '件見つかりました。';
            $('.search-result__hit-num').append(hitNum);
          }
        };
      
        // searchWordの実行
        $('#search-text').on('input', searchWord);
      });
      

})();
