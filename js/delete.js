// thong ba troc khi thuc hien hanh vi xoa du lieu

const deleteButtons = document.querySelectorAll('#delete');
deleteButtons.forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        const confirmation = confirm('Bạn có chắc muốn xóa thông tin này ?');
        if (confirmation) {
            window.location.href = this.href;
        }
    });
});

