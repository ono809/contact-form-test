<div id="modal" class="modal-overlay" style="display: none;">
    <div class="modal-content">
        <button class="modal-close" id="modal-close">×</button>
        <h2>お問い合わせ詳細</h2>
        <div class="modal-body">
            <p><strong>お名前:</strong> <span id="modal-name">山田 太郎</span></p>
            <p><strong>性別:</strong> <span id="modal-gender">男性</span></p>
            <p><strong>メールアドレス:</strong> <span id="modal-email">sample@example.com</span></p>
            <p><strong>お問い合わせの種類:</strong> <span id="modal-category">商品の交換について</span></p>
            <p><strong>内容:</strong> <span id="modal-message">商品を交換したいです。</span></p>
        </div>
        <form id="modal-delete-form" method="POST" action="">
            @csrf
            @method('DELETE')
            <button type="submit" class="modal-delete-btn">削除</button>
        </form>
    </div>
</div>