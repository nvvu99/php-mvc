<form method="post">
    <?php if (isset($articleId)) { ?>
        <fieldset>
            <input 
                id="article-id"
                type="hidden"
                name="article_id"
                value="<?= $articleId ?>"
            >
        </fieldset>
    <?php } ?>
    <fieldset>
        <label for="title">Title:</label>
        <input 
            id="title"
            name="title"
            value="<?= $form->getTitle() ?>"
        >
        <?php foreach ($form->getErrorMessagesForTitle() as $errorMessage) { ?>
            <div class="error-message">
                <?= $errorMessage ?>
            </div>
        <?php } ?>
    </fieldset>
    <fieldset>
        <label for="content">Content:</label>
        <textarea
            id="content"
            name="content"
        ><?= $form->getContent() ?></textarea>
        <?php foreach (
            $form->getErrorMessagesForContent()
            as $errorMessage
        ) { ?>
            <div class="error-message">
                <?= $errorMessage ?>
            </div>
        <?php } ?>
    </fieldset>
    <div class="success-message">
        <?= (string) $successMessage ?>
    </div>
    <button type="reset" class="button-reset">
        Reset
    </button>
    <button type="submit" class="button-submit">
        Submit
    </button>
</form>
