<?php

use light\swagger\SwaggerUIAsset;
use yii\helpers\Html;
use yii\web\Request;

\frontend\assets\AppAsset::register($this);
//$this->registerJsFile('../../../node_modules/jquery/dist/jquery.min.js');
SwaggerUIAsset::register($this);
/** @var string $rest_url */
/** @var array $oauthConfig */
 ?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Swagger UI</title>
    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>
    <script type="text/javascript">
        $(function () {
            var csrfHeader = <?= json_encode(Request::CSRF_HEADER) ?>;
            var url = window.location.search.match(/url=([^&]+)/);
            if (url && url.length > 1) {
                url = decodeURIComponent(url[1]);
            } else {
                url = "<?= $rest_url ?>";
            }

            hljs.configure({
                highlightSizeThreshold: 5000
            });

            // Pre load translate...
            if(window.SwaggerTranslator) {
                window.SwaggerTranslator.translate();
            }
            window.swaggerUi = new SwaggerUi({
                url: url,
                dom_id: "swagger-ui-container",
                supportedSubmitMethods: ['options', 'head', 'get', 'post', 'put', 'delete', 'patch'],
                onComplete: function(){
                    window.swaggerUi.api.clientAuthorizations.add(
                        csrfHeader,
                        new SwaggerClient.ApiKeyAuthorization(
                            csrfHeader,
                            $('meta[name="csrf-token"]').attr('content'),
                            "header"
                        )
                    );
                },
                onFailure: function(data) {
                    log("Unable to Load SwaggerUI");
                },
                docExpansion: "none",
                jsonEditor: false,
                defaultModelRendering: 'schema',
                showRequestHeaders: false,
                showOperationIds: false,
                validatorUrl: null
            });

            window.swaggerUi.load();

            function log() {
                if ('console' in window) {
                    console.log.apply(console, arguments);
                }
            }
        });
    </script>
</head>

<body class="swagger-section">
<?php $this->beginBody() ?>
<div id='header'>
    <div class="swagger-ui-wrap">
        <a id="logo" href="http://swagger.io"><span class="logo__title">swagger</span></a>
        <form id='api_selector'>
            <div class='input'><input placeholder="http://example.com/api" id="input_baseUrl" name="baseUrl" type="text"/></div>
            <div id='auth_container'></div>
            <div class='input'><a id="explore" class="header__btn" href="#" data-sw-translate>Explore</a></div>
        </form>
    </div>
</div>

<div id="message-bar" class="swagger-ui-wrap" data-sw-translate>&nbsp;</div>
<div id="swagger-ui-container" class="swagger-ui-wrap"></div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
