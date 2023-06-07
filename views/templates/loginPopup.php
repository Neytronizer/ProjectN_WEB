<div class="popup" id="loginPopup">
    <div class="popup__window">
        <div class="popup__window__close" onclick="hidePopup()">&times;</div>
        <div class="popup__window__content">
            <form action="../../vendor/authentication.php" method="POST">
                <input class="popup__window__input" type="text" name="login" placeholder="Login">
                <input class="popup__window__input" type="password" name="password" placeholder="Password">
                <input type="hidden" name="isRegistrationRequest" value="false">
                <input class="popup__window__submit submit--blue" type="submit" name="log in" value="Sign in">
            </form>
        </div>
    </div>
</div>