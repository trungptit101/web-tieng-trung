function changeSelLevel() {
    $('.selLevel').change(function() {
        setSelLevel();
    });
}
setSelLevel();
changeSelLevel();

function setSelLevel() {
    let url = '/manage/category/getParentCategory';
    let level = $('.selLevel').find(':selected').val();

    $.ajax({
        url: url,
        method: "POST",
        data: {
            level: level,
        },
        async: false,
        success:function(res){
            console.log('>>> res: ', res);
            $('.selParentId').html(getSelParentIdHtml(res.categories));
        },
        error: function(err) {
            console.log('>>> err', err);
        }
    });
}

function getSelParentIdHtml(data) {
    let html = '';
    let parent_id_hidden = $('#parent_id_hidden').val();
    data.map((item, index) => {
        html = html + `<option ${parent_id_hidden == item.id ? 'selected' : ''} value="${item.id}">${item.name}</option>`
    })

    return html;
}