(() => {
    const Category1 = document.getElementById('category-1');
    const Category2 = document.getElementById('category-2');
    const Category3 = document.getElementById('category-3');
    const Category4 = document.getElementById('category-4');
    const Category5 = document.getElementById('category-5');
    const Category6 = document.getElementById('category-6');
    const Category7 = document.getElementById('category-7');
    const SearchButton = document.getElementById('js-search-button');
    const EditButton = document.getElementById('edit-button');
    const yOffset = -50; 

    window.onload = function() {
        const y = Category1.getBoundingClientRect().top + window.pageYOffset + yOffset;
        window.scrollTo({top: y, behavior: 'smooth'});
    }

    const select1 = document.querySelector('[name="leaf_attachment"]');
    select1.onchange = event => {
        const y = Category2.getBoundingClientRect().top + window.pageYOffset + yOffset;
        window.scrollTo({top: y, behavior: 'smooth'});
    }
    const select2 = document.querySelector('[name="leaf_pattern"]');
    select2.onchange = event => {
        const y = Category3.getBoundingClientRect().top + window.pageYOffset + yOffset;
        window.scrollTo({top: y, behavior: 'smooth'});
    }
    const select3 = document.querySelector('[name="leaf_shape"]');
    select3.onchange = event => {
        const y = Category4.getBoundingClientRect().top + window.pageYOffset + yOffset;
        window.scrollTo({top: y, behavior: 'smooth'});
    }
    const select4 = document.querySelector('[name="leaf_blade"]');
    select4.onchange = event => {
        const y = Category5.getBoundingClientRect().top + window.pageYOffset + yOffset;
        window.scrollTo({top: y, behavior: 'smooth'});
    }
    const select5 = document.querySelector('[name="leaf_edge"]');
    select5.onchange = event => {
        const y = Category6.getBoundingClientRect().top + window.pageYOffset + yOffset;
        window.scrollTo({top: y, behavior: 'smooth'});
    }
    const select6 = document.querySelector('[name="leaf_vein"]');
    select6.onchange = event => {
        const y = Category7.getBoundingClientRect().top + window.pageYOffset + yOffset;
        window.scrollTo({top: y, behavior: 'smooth'});
    }
    const select7 = document.querySelector('[name="leaf_lateral_vein"]');
    select7.onchange = event => {
        SearchButton.scrollIntoView(true);
    }

    $(function () {
        searchWord = function(){
        let searchResult,
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
            for (let i = 0; i < searchResult.length; i ++) {
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
