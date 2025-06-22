// public/js/modal.js

document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('modal');
    const modalClose = document.getElementById('modal-close');
    const detailButtons = document.querySelectorAll('.detail-btn');

    detailButtons.forEach(button => {
        button.addEventListener('click', function () {
            const id = this.dataset.id;

            // 仮データ（実際はAJAXなどで取得）
            document.getElementById('modal-name').textContent = '山田 太郎';
            document.getElementById('modal-gender').textContent = '男性';
            document.getElementById('modal-email').textContent = 'sample@example.com';
            document.getElementById('modal-category').textContent = '商品の交換について';
            document.getElementById('modal-message').textContent = '商品を交換したいです。';

            // 削除ボタンのformアクションを設定
            const deleteForm = document.getElementById('modal-delete-form');
            deleteForm.action = `/admin/delete/${id}`;

            modal.style.display = 'block';
        });
    });

    modalClose.addEventListener('click', function () {
        modal.style.display = 'none';
    });

    window.addEventListener('click', function (e) {
        if (e.target === modal) {
            modal.style.display = 'none';
        }
    });
});
