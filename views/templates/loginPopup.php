<div class="popup" id="loginPopup">
    <div class="popup__window">
        <div class="popup__window__close" onclick="hidePopup()">&times;</div>
        <div class="popup__window__content">
            <form action="../../vendor/authentication.php" method="post">
                <input class="popup__window__input" type="text" name="login" id="login" placeholder=" Login">
                <input class="popup__window__input" type="password" name="password" id="password" placeholder=" Password">
                <input class="popup__window__submit submit--blue" type="submit" name="log in" value="Sign in">
            </form>
        </div>
    </div>
</div>