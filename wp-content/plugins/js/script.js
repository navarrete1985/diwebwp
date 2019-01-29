(function ($) {
    
    $('.btn-add-actor').on('click', catchEvent);
    $('#review-actor').on('enterKey', catchEvent);
    $('.delete-actor').on('click', removeItem);
    
    function catchEvent(event) {
        event.preventDefault()
        let item = $('#review-actor');
        let value = $.trim(item.val());
        if (value.length > 0 && isValid(value)) {
            addActor(value);
        }
        item.val('');
    }
    
    function addActor(data) {
        let item = $('.content-casting').append(
            `<span class='item'>
                <input type="hidden" name="review_casting[]" value="${data}"/>
                <span class='name-author actor'>${data}</span>
                <span type='button' class='delete-actor dashicons-before dashicons-no-alt'></span>
            </span>`
        );
        $('.delete-actor').on('click', removeItem);
    }
    
    function isValid(value) {
        let result = true;
        $('.name-author').each((index, obj) => {
            if ($(obj).text() == value) {
                result = false;
                return false;
            } 
        })
        return result;
    }
    
    function removeItem(event) {
        $(event.target).parent().remove();
    }
    
})(jQuery);
    