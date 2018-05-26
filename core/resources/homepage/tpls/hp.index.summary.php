<div class="row summary">
  <div class="col-lg-4">
    <div class="list-group">
      <div class="list-group-item" style="min-height:150px">
        <h4 class="list-group-item-heading"><?php echo $neardLang->getValue(Lang::ABOUT); ?></h4>
        <p class="list-group-item-text"><?php echo sprintf($neardLang->getValue(Lang::HOMEPAGE_ABOUT_HTML), Util::getWebsiteUrl(), Util::getGithubUrl()); ?></p>
      </div>
    </div>
  </div>
  <div class="col-lg-4">
    <div class="list-group">
      <div class="list-group-item" style="min-height:150px">
        <h4 class="list-group-item-heading"><?php echo $neardLang->getValue(Lang::LICENSE); ?></h4>
        <p class="list-group-item-text"><?php echo $neardLang->getValue(Lang::HOMEPAGE_LICENSE_TEXT); ?></p>
      </div>
    </div>
  </div>
  <div class="col-lg-4">
    <div class="list-group">
      <div class="list-group-item" style="min-height:150px">
        <h4 class="list-group-item-heading"><?php echo $neardLang->getValue(Lang::HOMEPAGE_QUESTIONS_TITLE); ?></h4>
        <div class="list-group-item-text">
          <p><?php echo $neardLang->getValue(Lang::HOMEPAGE_QUESTIONS_TEXT); ?></p>
          <p><a target="_blank" href="<?php echo Util::getGithubUrl('issues'); ?>" class="btn btn-primary" role="button"><i class="fa fa-github"></i> <?php echo $neardLang->getValue(Lang::HOMEPAGE_POST_ISSUE); ?></a></p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row" style="margin-top:20px;">
  <div class="col-lg-4">
    <div style="min-height:250px;" class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-gear"></i> <?php echo $neardLang->getValue(Lang::BINS); ?></h3>
      </div>
      <div class="panel-body panel-summary">
        <div class="list-group" style="margin-bottom:0;">
          <span class="list-group-item summary-binapache">
            <span class="loader" style="float:right"><img src="<?php echo $neardHomepage->getResourcesPath() . '/img/loader.gif'; ?>" /></span>
            <a href="#apache"><?php echo $neardLang->getValue(Lang::APACHE); ?></a>
          </span>
          <span class="list-group-item summary-binphp">
            <span class="loader" style="float:right"><img src="<?php echo $neardHomepage->getResourcesPath() . '/img/loader.gif'; ?>" /></span>
            <a href="#php"><?php echo $neardLang->getValue(Lang::PHP); ?></a>
          </span>
          <span class="list-group-item summary-binmysql">
            <span class="loader" style="float:right"><img src="<?php echo $neardHomepage->getResourcesPath() . '/img/loader.gif'; ?>" /></span>
            <a href="#mysql"><?php echo $neardLang->getValue(Lang::MYSQL); ?></a>
          </span>
          <span class="list-group-item summary-binmariadb">
            <span class="loader" style="float:right"><img src="<?php echo $neardHomepage->getResourcesPath() . '/img/loader.gif'; ?>" /></span>
            <a href="#mariadb"><?php echo $neardLang->getValue(Lang::MARIADB); ?></a>
          </span>
          <span class="list-group-item summary-binpostgresql">
            <span class="loader" style="float:right"><img src="<?php echo $neardHomepage->getResourcesPath() . '/img/loader.gif'; ?>" /></span>
            <a href="#postgresql"><?php echo $neardLang->getValue(Lang::POSTGRESQL); ?></a>
          </span>
          <span class="list-group-item summary-binnodejs">
            <span class="loader" style="float:right"><img src="<?php echo $neardHomepage->getResourcesPath() . '/img/loader.gif'; ?>" /></span>
            <a href="#nodejs"><?php echo $neardLang->getValue(Lang::NODEJS); ?></a>
          </span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4">
    <div style="min-height:250px;" class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-wrench"></i> <?php echo $neardLang->getValue(Lang::TOOLS); ?></h3>
      </div>
      <div class="panel-body panel-summary">
        <div class="list-group" style="margin-bottom:0;">
          <span class="list-group-item">
            <a href="<?php echo Util::getWebsiteUrl('modules/composer', '#releases'); ?>" target="_blank" title="<?php echo $neardLang->getValue(Lang::DOWNLOAD_MORE); ?>"><span style="float:right;margin-left:8px;"><i class="fa fa-download"></i></span></a>
            <span style="float:right;font-size:12px" class="label label-primary"><?php echo $neardTools->getComposer()->getVersion(); ?></span>
            <span><?php echo $neardLang->getValue(Lang::COMPOSER); ?></span>
          </span>
          <span class="list-group-item">
            <a href="<?php echo Util::getWebsiteUrl('modules/console', '#releases'); ?>" target="_blank" title="<?php echo $neardLang->getValue(Lang::DOWNLOAD_MORE); ?>"><span style="float:right;margin-left:8px;"><i class="fa fa-download"></i></span></a>
            <span style="float:right;font-size:12px" class="label label-primary"><?php echo $neardTools->getConsole()->getVersion(); ?></span>
            <span><?php echo $neardLang->getValue(Lang::CONSOLE); ?></span>
          </span>
          <span class="list-group-item">
            <a href="<?php echo Util::getWebsiteUrl('modules/ghostscript', '#releases'); ?>" target="_blank" title="<?php echo $neardLang->getValue(Lang::DOWNLOAD_MORE); ?>"><span style="float:right;margin-left:8px;"><i class="fa fa-download"></i></span></a>
            <span style="float:right;font-size:12px" class="label label-primary"><?php echo $neardTools->getGhostscript()->getVersion(); ?></span>
            <span><?php echo $neardLang->getValue(Lang::GHOSTSCRIPT); ?></span>
          </span>
          <span class="list-group-item">
            <a href="<?php echo Util::getWebsiteUrl('modules/git', '#releases'); ?>" target="_blank" title="<?php echo $neardLang->getValue(Lang::DOWNLOAD_MORE); ?>"><span style="float:right;margin-left:8px;"><i class="fa fa-download"></i></span></a>
            <span style="float:right;font-size:12px" class="label label-primary"><?php echo $neardTools->getGit()->getVersion(); ?></span>
            <span><?php echo $neardLang->getValue(Lang::GIT); ?></span>
          </span>
          <span class="list-group-item">
            <a href="<?php echo Util::getWebsiteUrl('modules/xdc', '#releases'); ?>" target="_blank" title="<?php echo $neardLang->getValue(Lang::DOWNLOAD_MORE); ?>"><span style="float:right;margin-left:8px;"><i class="fa fa-download"></i></span></a>
            <span style="float:right;font-size:12px" class="label label-primary"><?php echo $neardTools->getXdc()->getVersion(); ?></span>
            <span><?php echo $neardLang->getValue(Lang::XDC); ?></span>
          </span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4">
    <div style="min-height:250px;" class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-asterisk"></i> <?php echo $neardLang->getValue(Lang::APPS); ?></h3>
      </div>
      <div class="panel-body panel-summary">
        <div class="list-group" style="margin-bottom:0;">
          <span class="list-group-item">
            <a href="<?php echo Util::getWebsiteUrl('modules/adminer', '#releases'); ?>" target="_blank" title="<?php echo $neardLang->getValue(Lang::DOWNLOAD_MORE); ?>"><span style="float:right;margin-left:8px;"><i class="fa fa-download"></i></span></a>
            <span style="float:right;font-size:12px" class="label label-primary"><?php echo $neardApps->getAdminer()->getVersion(); ?></span>
            <a href="adminer" target="_blank"><?php echo $neardLang->getValue(Lang::ADMINER); ?></a>
          </span>
        </div>
      </div>
    </div>
  </div>
</div>