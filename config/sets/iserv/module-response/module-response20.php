<?php

declare(strict_types=1);

use Rector\Renaming\Rector\MethodCall\RenameMethodRector;
use Rector\Renaming\ValueObject\MethodCallRename;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();

    $services->set(RenameMethodRector::class)
        ->call('configure', [[
            RenameMethodRector::METHOD_CALL_RENAMES => ValueObjectInliner::inline([
                //region ResponseContent
                new MethodCallRename(
                    'IServ\Library\ModuleResponse\ResponseContent',
                    'body',
                    'getBody',
                ),
                new MethodCallRename(
                    'IServ\Library\ModuleResponse\ResponseContent',
                    'stream',
                    'getStream',
                ),
                new MethodCallRename(
                    'IServ\Library\ModuleResponse\ResponseContent',
                    'exception',
                    'getException',
                ),
                new MethodCallRename(
                    'IServ\Library\ModuleResponse\ResponseContent',
                    'type',
                    'getType',
                ),
                new MethodCallRename(
                    'IServ\Library\ModuleResponse\ResponseContent',
                    'title',
                    'getTitle',
                ),
                new MethodCallRename(
                    'IServ\Library\ModuleResponse\ResponseContent',
                    'stylesheets',
                    'getStylesheets',
                ),
                new MethodCallRename(
                    'IServ\Library\ModuleResponse\ResponseContent',
                    'scripts',
                    'getScripts',
                ),
                new MethodCallRename(
                    'IServ\Library\ModuleResponse\ResponseContent',
                    'breadcrumbs',
                    'getBreadcrumbs',
                ),
                new MethodCallRename(
                    'IServ\Library\ModuleResponse\ResponseContent',
                    'headElements',
                    'getHeadElements',
                ),
                new MethodCallRename(
                    'IServ\Library\ModuleResponse\ResponseContent',
                    'helpLink',
                    'getHelpLink',
                ),
                new MethodCallRename(
                    'IServ\Library\ModuleResponse\ResponseContent',
                    'manualLink',
                    'getManualLink',
                ),
                new MethodCallRename(
                    'IServ\Library\ModuleResponse\ResponseContent',
                    'messages',
                    'getMessages',
                ),
                //endregion
                //region Message
                new MethodCallRename(
                    'IServ\Library\ModuleResponse\Message',
                    'message',
                    'getMessage',
                ),
                new MethodCallRename(
                    'IServ\Library\ModuleResponse\Message',
                    'type',
                    'getType',
                ),
                new MethodCallRename(
                    'IServ\Library\ModuleResponse\Message',
                    'dismissible',
                    'isDismissible',
                ),
                //endregion
            ]),
        ]]);

};
