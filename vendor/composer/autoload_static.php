<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0d141d32e9162f5c7415075a374fd261
{
    public static $files = array (
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Component\\Translation\\' => 30,
            'Symfony\\Component\\HttpFoundation\\' => 33,
            'Symfony\\Component\\Debug\\' => 24,
            'Symfony\\Component\\Console\\' => 26,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'C' => 
        array (
            'Carbon\\' => 7,
        ),
        'A' => 
        array (
            'Acme\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Component\\Translation\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/translation',
        ),
        'Symfony\\Component\\HttpFoundation\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/http-foundation',
        ),
        'Symfony\\Component\\Debug\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/debug',
        ),
        'Symfony\\Component\\Console\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/console',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Carbon\\' => 
        array (
            0 => __DIR__ . '/..' . '/nesbot/carbon/src/Carbon',
        ),
        'Acme\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Acme\\AddComment' => __DIR__ . '/../..' . '/src/AddComment.php',
        'Acme\\AddTime' => __DIR__ . '/../..' . '/src/AddTime.php',
        'Acme\\ArchiveProject' => __DIR__ . '/../..' . '/src/ArchiveProject.php',
        'Acme\\CalculateTime' => __DIR__ . '/../..' . '/src/CalculateTime.php',
        'Acme\\Command' => __DIR__ . '/../..' . '/src/Command.php',
        'Acme\\CsvResponse' => __DIR__ . '/../..' . '/src/CsvResponse.php',
        'Acme\\DatabaseAdapter' => __DIR__ . '/../..' . '/src/DatabaseAdapter.php',
        'Acme\\DeleteTime' => __DIR__ . '/../..' . '/src/DeleteTime.php',
        'Acme\\EditTime' => __DIR__ . '/../..' . '/src/EditTime.php',
        'Acme\\ExportEntries' => __DIR__ . '/../..' . '/src/ExportEntries.php',
        'Acme\\FormatTime' => __DIR__ . '/../..' . '/src/FormatTime.php',
        'Acme\\NewProject' => __DIR__ . '/../..' . '/src/NewProject.php',
        'Acme\\OutputMessage' => __DIR__ . '/../..' . '/src/OutputMessage.php',
        'Acme\\RestoreProject' => __DIR__ . '/../..' . '/src/RestoreProject.php',
        'Acme\\RunningTimers' => __DIR__ . '/../..' . '/src/RunningTimers.php',
        'Acme\\Session' => __DIR__ . '/../..' . '/src/Session.php',
        'Acme\\ShowDates' => __DIR__ . '/../..' . '/src/ShowDates.php',
        'Acme\\ShowDay' => __DIR__ . '/../..' . '/src/ShowDay.php',
        'Acme\\ShowProjects' => __DIR__ . '/../..' . '/src/ShowProjects.php',
        'Acme\\ShowTimes' => __DIR__ . '/../..' . '/src/ShowTimes.php',
        'Acme\\ShowWeek' => __DIR__ . '/../..' . '/src/ShowWeek.php',
        'Acme\\StartProject' => __DIR__ . '/../..' . '/src/StartProject.php',
        'Acme\\StopProject' => __DIR__ . '/../..' . '/src/StopProject.php',
        'Carbon\\Carbon' => __DIR__ . '/..' . '/nesbot/carbon/src/Carbon/Carbon.php',
        'Carbon\\CarbonInterval' => __DIR__ . '/..' . '/nesbot/carbon/src/Carbon/CarbonInterval.php',
        'Psr\\Log\\AbstractLogger' => __DIR__ . '/..' . '/psr/log/Psr/Log/AbstractLogger.php',
        'Psr\\Log\\InvalidArgumentException' => __DIR__ . '/..' . '/psr/log/Psr/Log/InvalidArgumentException.php',
        'Psr\\Log\\LogLevel' => __DIR__ . '/..' . '/psr/log/Psr/Log/LogLevel.php',
        'Psr\\Log\\LoggerAwareInterface' => __DIR__ . '/..' . '/psr/log/Psr/Log/LoggerAwareInterface.php',
        'Psr\\Log\\LoggerAwareTrait' => __DIR__ . '/..' . '/psr/log/Psr/Log/LoggerAwareTrait.php',
        'Psr\\Log\\LoggerInterface' => __DIR__ . '/..' . '/psr/log/Psr/Log/LoggerInterface.php',
        'Psr\\Log\\LoggerTrait' => __DIR__ . '/..' . '/psr/log/Psr/Log/LoggerTrait.php',
        'Psr\\Log\\NullLogger' => __DIR__ . '/..' . '/psr/log/Psr/Log/NullLogger.php',
        'Psr\\Log\\Test\\DummyTest' => __DIR__ . '/..' . '/psr/log/Psr/Log/Test/LoggerInterfaceTest.php',
        'Psr\\Log\\Test\\LoggerInterfaceTest' => __DIR__ . '/..' . '/psr/log/Psr/Log/Test/LoggerInterfaceTest.php',
        'Symfony\\Component\\Console\\Application' => __DIR__ . '/..' . '/symfony/console/Application.php',
        'Symfony\\Component\\Console\\Command\\Command' => __DIR__ . '/..' . '/symfony/console/Command/Command.php',
        'Symfony\\Component\\Console\\Command\\HelpCommand' => __DIR__ . '/..' . '/symfony/console/Command/HelpCommand.php',
        'Symfony\\Component\\Console\\Command\\ListCommand' => __DIR__ . '/..' . '/symfony/console/Command/ListCommand.php',
        'Symfony\\Component\\Console\\ConsoleEvents' => __DIR__ . '/..' . '/symfony/console/ConsoleEvents.php',
        'Symfony\\Component\\Console\\Descriptor\\ApplicationDescription' => __DIR__ . '/..' . '/symfony/console/Descriptor/ApplicationDescription.php',
        'Symfony\\Component\\Console\\Descriptor\\Descriptor' => __DIR__ . '/..' . '/symfony/console/Descriptor/Descriptor.php',
        'Symfony\\Component\\Console\\Descriptor\\DescriptorInterface' => __DIR__ . '/..' . '/symfony/console/Descriptor/DescriptorInterface.php',
        'Symfony\\Component\\Console\\Descriptor\\JsonDescriptor' => __DIR__ . '/..' . '/symfony/console/Descriptor/JsonDescriptor.php',
        'Symfony\\Component\\Console\\Descriptor\\MarkdownDescriptor' => __DIR__ . '/..' . '/symfony/console/Descriptor/MarkdownDescriptor.php',
        'Symfony\\Component\\Console\\Descriptor\\TextDescriptor' => __DIR__ . '/..' . '/symfony/console/Descriptor/TextDescriptor.php',
        'Symfony\\Component\\Console\\Descriptor\\XmlDescriptor' => __DIR__ . '/..' . '/symfony/console/Descriptor/XmlDescriptor.php',
        'Symfony\\Component\\Console\\Event\\ConsoleCommandEvent' => __DIR__ . '/..' . '/symfony/console/Event/ConsoleCommandEvent.php',
        'Symfony\\Component\\Console\\Event\\ConsoleEvent' => __DIR__ . '/..' . '/symfony/console/Event/ConsoleEvent.php',
        'Symfony\\Component\\Console\\Event\\ConsoleExceptionEvent' => __DIR__ . '/..' . '/symfony/console/Event/ConsoleExceptionEvent.php',
        'Symfony\\Component\\Console\\Event\\ConsoleTerminateEvent' => __DIR__ . '/..' . '/symfony/console/Event/ConsoleTerminateEvent.php',
        'Symfony\\Component\\Console\\Exception\\CommandNotFoundException' => __DIR__ . '/..' . '/symfony/console/Exception/CommandNotFoundException.php',
        'Symfony\\Component\\Console\\Exception\\ExceptionInterface' => __DIR__ . '/..' . '/symfony/console/Exception/ExceptionInterface.php',
        'Symfony\\Component\\Console\\Exception\\InvalidArgumentException' => __DIR__ . '/..' . '/symfony/console/Exception/InvalidArgumentException.php',
        'Symfony\\Component\\Console\\Exception\\InvalidOptionException' => __DIR__ . '/..' . '/symfony/console/Exception/InvalidOptionException.php',
        'Symfony\\Component\\Console\\Exception\\LogicException' => __DIR__ . '/..' . '/symfony/console/Exception/LogicException.php',
        'Symfony\\Component\\Console\\Exception\\RuntimeException' => __DIR__ . '/..' . '/symfony/console/Exception/RuntimeException.php',
        'Symfony\\Component\\Console\\Formatter\\OutputFormatter' => __DIR__ . '/..' . '/symfony/console/Formatter/OutputFormatter.php',
        'Symfony\\Component\\Console\\Formatter\\OutputFormatterInterface' => __DIR__ . '/..' . '/symfony/console/Formatter/OutputFormatterInterface.php',
        'Symfony\\Component\\Console\\Formatter\\OutputFormatterStyle' => __DIR__ . '/..' . '/symfony/console/Formatter/OutputFormatterStyle.php',
        'Symfony\\Component\\Console\\Formatter\\OutputFormatterStyleInterface' => __DIR__ . '/..' . '/symfony/console/Formatter/OutputFormatterStyleInterface.php',
        'Symfony\\Component\\Console\\Formatter\\OutputFormatterStyleStack' => __DIR__ . '/..' . '/symfony/console/Formatter/OutputFormatterStyleStack.php',
        'Symfony\\Component\\Console\\Helper\\DebugFormatterHelper' => __DIR__ . '/..' . '/symfony/console/Helper/DebugFormatterHelper.php',
        'Symfony\\Component\\Console\\Helper\\DescriptorHelper' => __DIR__ . '/..' . '/symfony/console/Helper/DescriptorHelper.php',
        'Symfony\\Component\\Console\\Helper\\FormatterHelper' => __DIR__ . '/..' . '/symfony/console/Helper/FormatterHelper.php',
        'Symfony\\Component\\Console\\Helper\\Helper' => __DIR__ . '/..' . '/symfony/console/Helper/Helper.php',
        'Symfony\\Component\\Console\\Helper\\HelperInterface' => __DIR__ . '/..' . '/symfony/console/Helper/HelperInterface.php',
        'Symfony\\Component\\Console\\Helper\\HelperSet' => __DIR__ . '/..' . '/symfony/console/Helper/HelperSet.php',
        'Symfony\\Component\\Console\\Helper\\InputAwareHelper' => __DIR__ . '/..' . '/symfony/console/Helper/InputAwareHelper.php',
        'Symfony\\Component\\Console\\Helper\\ProcessHelper' => __DIR__ . '/..' . '/symfony/console/Helper/ProcessHelper.php',
        'Symfony\\Component\\Console\\Helper\\ProgressBar' => __DIR__ . '/..' . '/symfony/console/Helper/ProgressBar.php',
        'Symfony\\Component\\Console\\Helper\\ProgressIndicator' => __DIR__ . '/..' . '/symfony/console/Helper/ProgressIndicator.php',
        'Symfony\\Component\\Console\\Helper\\QuestionHelper' => __DIR__ . '/..' . '/symfony/console/Helper/QuestionHelper.php',
        'Symfony\\Component\\Console\\Helper\\SymfonyQuestionHelper' => __DIR__ . '/..' . '/symfony/console/Helper/SymfonyQuestionHelper.php',
        'Symfony\\Component\\Console\\Helper\\Table' => __DIR__ . '/..' . '/symfony/console/Helper/Table.php',
        'Symfony\\Component\\Console\\Helper\\TableCell' => __DIR__ . '/..' . '/symfony/console/Helper/TableCell.php',
        'Symfony\\Component\\Console\\Helper\\TableSeparator' => __DIR__ . '/..' . '/symfony/console/Helper/TableSeparator.php',
        'Symfony\\Component\\Console\\Helper\\TableStyle' => __DIR__ . '/..' . '/symfony/console/Helper/TableStyle.php',
        'Symfony\\Component\\Console\\Input\\ArgvInput' => __DIR__ . '/..' . '/symfony/console/Input/ArgvInput.php',
        'Symfony\\Component\\Console\\Input\\ArrayInput' => __DIR__ . '/..' . '/symfony/console/Input/ArrayInput.php',
        'Symfony\\Component\\Console\\Input\\Input' => __DIR__ . '/..' . '/symfony/console/Input/Input.php',
        'Symfony\\Component\\Console\\Input\\InputArgument' => __DIR__ . '/..' . '/symfony/console/Input/InputArgument.php',
        'Symfony\\Component\\Console\\Input\\InputAwareInterface' => __DIR__ . '/..' . '/symfony/console/Input/InputAwareInterface.php',
        'Symfony\\Component\\Console\\Input\\InputDefinition' => __DIR__ . '/..' . '/symfony/console/Input/InputDefinition.php',
        'Symfony\\Component\\Console\\Input\\InputInterface' => __DIR__ . '/..' . '/symfony/console/Input/InputInterface.php',
        'Symfony\\Component\\Console\\Input\\InputOption' => __DIR__ . '/..' . '/symfony/console/Input/InputOption.php',
        'Symfony\\Component\\Console\\Input\\StringInput' => __DIR__ . '/..' . '/symfony/console/Input/StringInput.php',
        'Symfony\\Component\\Console\\Logger\\ConsoleLogger' => __DIR__ . '/..' . '/symfony/console/Logger/ConsoleLogger.php',
        'Symfony\\Component\\Console\\Output\\BufferedOutput' => __DIR__ . '/..' . '/symfony/console/Output/BufferedOutput.php',
        'Symfony\\Component\\Console\\Output\\ConsoleOutput' => __DIR__ . '/..' . '/symfony/console/Output/ConsoleOutput.php',
        'Symfony\\Component\\Console\\Output\\ConsoleOutputInterface' => __DIR__ . '/..' . '/symfony/console/Output/ConsoleOutputInterface.php',
        'Symfony\\Component\\Console\\Output\\NullOutput' => __DIR__ . '/..' . '/symfony/console/Output/NullOutput.php',
        'Symfony\\Component\\Console\\Output\\Output' => __DIR__ . '/..' . '/symfony/console/Output/Output.php',
        'Symfony\\Component\\Console\\Output\\OutputInterface' => __DIR__ . '/..' . '/symfony/console/Output/OutputInterface.php',
        'Symfony\\Component\\Console\\Output\\StreamOutput' => __DIR__ . '/..' . '/symfony/console/Output/StreamOutput.php',
        'Symfony\\Component\\Console\\Question\\ChoiceQuestion' => __DIR__ . '/..' . '/symfony/console/Question/ChoiceQuestion.php',
        'Symfony\\Component\\Console\\Question\\ConfirmationQuestion' => __DIR__ . '/..' . '/symfony/console/Question/ConfirmationQuestion.php',
        'Symfony\\Component\\Console\\Question\\Question' => __DIR__ . '/..' . '/symfony/console/Question/Question.php',
        'Symfony\\Component\\Console\\Style\\OutputStyle' => __DIR__ . '/..' . '/symfony/console/Style/OutputStyle.php',
        'Symfony\\Component\\Console\\Style\\StyleInterface' => __DIR__ . '/..' . '/symfony/console/Style/StyleInterface.php',
        'Symfony\\Component\\Console\\Style\\SymfonyStyle' => __DIR__ . '/..' . '/symfony/console/Style/SymfonyStyle.php',
        'Symfony\\Component\\Console\\Tester\\ApplicationTester' => __DIR__ . '/..' . '/symfony/console/Tester/ApplicationTester.php',
        'Symfony\\Component\\Console\\Tester\\CommandTester' => __DIR__ . '/..' . '/symfony/console/Tester/CommandTester.php',
        'Symfony\\Component\\Debug\\BufferingLogger' => __DIR__ . '/..' . '/symfony/debug/BufferingLogger.php',
        'Symfony\\Component\\Debug\\Debug' => __DIR__ . '/..' . '/symfony/debug/Debug.php',
        'Symfony\\Component\\Debug\\DebugClassLoader' => __DIR__ . '/..' . '/symfony/debug/DebugClassLoader.php',
        'Symfony\\Component\\Debug\\ErrorHandler' => __DIR__ . '/..' . '/symfony/debug/ErrorHandler.php',
        'Symfony\\Component\\Debug\\ExceptionHandler' => __DIR__ . '/..' . '/symfony/debug/ExceptionHandler.php',
        'Symfony\\Component\\Debug\\Exception\\ClassNotFoundException' => __DIR__ . '/..' . '/symfony/debug/Exception/ClassNotFoundException.php',
        'Symfony\\Component\\Debug\\Exception\\ContextErrorException' => __DIR__ . '/..' . '/symfony/debug/Exception/ContextErrorException.php',
        'Symfony\\Component\\Debug\\Exception\\FatalErrorException' => __DIR__ . '/..' . '/symfony/debug/Exception/FatalErrorException.php',
        'Symfony\\Component\\Debug\\Exception\\FatalThrowableError' => __DIR__ . '/..' . '/symfony/debug/Exception/FatalThrowableError.php',
        'Symfony\\Component\\Debug\\Exception\\FlattenException' => __DIR__ . '/..' . '/symfony/debug/Exception/FlattenException.php',
        'Symfony\\Component\\Debug\\Exception\\OutOfMemoryException' => __DIR__ . '/..' . '/symfony/debug/Exception/OutOfMemoryException.php',
        'Symfony\\Component\\Debug\\Exception\\UndefinedFunctionException' => __DIR__ . '/..' . '/symfony/debug/Exception/UndefinedFunctionException.php',
        'Symfony\\Component\\Debug\\Exception\\UndefinedMethodException' => __DIR__ . '/..' . '/symfony/debug/Exception/UndefinedMethodException.php',
        'Symfony\\Component\\Debug\\FatalErrorHandler\\ClassNotFoundFatalErrorHandler' => __DIR__ . '/..' . '/symfony/debug/FatalErrorHandler/ClassNotFoundFatalErrorHandler.php',
        'Symfony\\Component\\Debug\\FatalErrorHandler\\FatalErrorHandlerInterface' => __DIR__ . '/..' . '/symfony/debug/FatalErrorHandler/FatalErrorHandlerInterface.php',
        'Symfony\\Component\\Debug\\FatalErrorHandler\\UndefinedFunctionFatalErrorHandler' => __DIR__ . '/..' . '/symfony/debug/FatalErrorHandler/UndefinedFunctionFatalErrorHandler.php',
        'Symfony\\Component\\Debug\\FatalErrorHandler\\UndefinedMethodFatalErrorHandler' => __DIR__ . '/..' . '/symfony/debug/FatalErrorHandler/UndefinedMethodFatalErrorHandler.php',
        'Symfony\\Component\\HttpFoundation\\AcceptHeader' => __DIR__ . '/..' . '/symfony/http-foundation/AcceptHeader.php',
        'Symfony\\Component\\HttpFoundation\\AcceptHeaderItem' => __DIR__ . '/..' . '/symfony/http-foundation/AcceptHeaderItem.php',
        'Symfony\\Component\\HttpFoundation\\ApacheRequest' => __DIR__ . '/..' . '/symfony/http-foundation/ApacheRequest.php',
        'Symfony\\Component\\HttpFoundation\\BinaryFileResponse' => __DIR__ . '/..' . '/symfony/http-foundation/BinaryFileResponse.php',
        'Symfony\\Component\\HttpFoundation\\Cookie' => __DIR__ . '/..' . '/symfony/http-foundation/Cookie.php',
        'Symfony\\Component\\HttpFoundation\\Exception\\ConflictingHeadersException' => __DIR__ . '/..' . '/symfony/http-foundation/Exception/ConflictingHeadersException.php',
        'Symfony\\Component\\HttpFoundation\\ExpressionRequestMatcher' => __DIR__ . '/..' . '/symfony/http-foundation/ExpressionRequestMatcher.php',
        'Symfony\\Component\\HttpFoundation\\FileBag' => __DIR__ . '/..' . '/symfony/http-foundation/FileBag.php',
        'Symfony\\Component\\HttpFoundation\\File\\Exception\\AccessDeniedException' => __DIR__ . '/..' . '/symfony/http-foundation/File/Exception/AccessDeniedException.php',
        'Symfony\\Component\\HttpFoundation\\File\\Exception\\FileException' => __DIR__ . '/..' . '/symfony/http-foundation/File/Exception/FileException.php',
        'Symfony\\Component\\HttpFoundation\\File\\Exception\\FileNotFoundException' => __DIR__ . '/..' . '/symfony/http-foundation/File/Exception/FileNotFoundException.php',
        'Symfony\\Component\\HttpFoundation\\File\\Exception\\UnexpectedTypeException' => __DIR__ . '/..' . '/symfony/http-foundation/File/Exception/UnexpectedTypeException.php',
        'Symfony\\Component\\HttpFoundation\\File\\Exception\\UploadException' => __DIR__ . '/..' . '/symfony/http-foundation/File/Exception/UploadException.php',
        'Symfony\\Component\\HttpFoundation\\File\\File' => __DIR__ . '/..' . '/symfony/http-foundation/File/File.php',
        'Symfony\\Component\\HttpFoundation\\File\\MimeType\\ExtensionGuesser' => __DIR__ . '/..' . '/symfony/http-foundation/File/MimeType/ExtensionGuesser.php',
        'Symfony\\Component\\HttpFoundation\\File\\MimeType\\ExtensionGuesserInterface' => __DIR__ . '/..' . '/symfony/http-foundation/File/MimeType/ExtensionGuesserInterface.php',
        'Symfony\\Component\\HttpFoundation\\File\\MimeType\\FileBinaryMimeTypeGuesser' => __DIR__ . '/..' . '/symfony/http-foundation/File/MimeType/FileBinaryMimeTypeGuesser.php',
        'Symfony\\Component\\HttpFoundation\\File\\MimeType\\FileinfoMimeTypeGuesser' => __DIR__ . '/..' . '/symfony/http-foundation/File/MimeType/FileinfoMimeTypeGuesser.php',
        'Symfony\\Component\\HttpFoundation\\File\\MimeType\\MimeTypeExtensionGuesser' => __DIR__ . '/..' . '/symfony/http-foundation/File/MimeType/MimeTypeExtensionGuesser.php',
        'Symfony\\Component\\HttpFoundation\\File\\MimeType\\MimeTypeGuesser' => __DIR__ . '/..' . '/symfony/http-foundation/File/MimeType/MimeTypeGuesser.php',
        'Symfony\\Component\\HttpFoundation\\File\\MimeType\\MimeTypeGuesserInterface' => __DIR__ . '/..' . '/symfony/http-foundation/File/MimeType/MimeTypeGuesserInterface.php',
        'Symfony\\Component\\HttpFoundation\\File\\UploadedFile' => __DIR__ . '/..' . '/symfony/http-foundation/File/UploadedFile.php',
        'Symfony\\Component\\HttpFoundation\\HeaderBag' => __DIR__ . '/..' . '/symfony/http-foundation/HeaderBag.php',
        'Symfony\\Component\\HttpFoundation\\IpUtils' => __DIR__ . '/..' . '/symfony/http-foundation/IpUtils.php',
        'Symfony\\Component\\HttpFoundation\\JsonResponse' => __DIR__ . '/..' . '/symfony/http-foundation/JsonResponse.php',
        'Symfony\\Component\\HttpFoundation\\ParameterBag' => __DIR__ . '/..' . '/symfony/http-foundation/ParameterBag.php',
        'Symfony\\Component\\HttpFoundation\\RedirectResponse' => __DIR__ . '/..' . '/symfony/http-foundation/RedirectResponse.php',
        'Symfony\\Component\\HttpFoundation\\Request' => __DIR__ . '/..' . '/symfony/http-foundation/Request.php',
        'Symfony\\Component\\HttpFoundation\\RequestMatcher' => __DIR__ . '/..' . '/symfony/http-foundation/RequestMatcher.php',
        'Symfony\\Component\\HttpFoundation\\RequestMatcherInterface' => __DIR__ . '/..' . '/symfony/http-foundation/RequestMatcherInterface.php',
        'Symfony\\Component\\HttpFoundation\\RequestStack' => __DIR__ . '/..' . '/symfony/http-foundation/RequestStack.php',
        'Symfony\\Component\\HttpFoundation\\Response' => __DIR__ . '/..' . '/symfony/http-foundation/Response.php',
        'Symfony\\Component\\HttpFoundation\\ResponseHeaderBag' => __DIR__ . '/..' . '/symfony/http-foundation/ResponseHeaderBag.php',
        'Symfony\\Component\\HttpFoundation\\ServerBag' => __DIR__ . '/..' . '/symfony/http-foundation/ServerBag.php',
        'Symfony\\Component\\HttpFoundation\\Session\\Attribute\\AttributeBag' => __DIR__ . '/..' . '/symfony/http-foundation/Session/Attribute/AttributeBag.php',
        'Symfony\\Component\\HttpFoundation\\Session\\Attribute\\AttributeBagInterface' => __DIR__ . '/..' . '/symfony/http-foundation/Session/Attribute/AttributeBagInterface.php',
        'Symfony\\Component\\HttpFoundation\\Session\\Attribute\\NamespacedAttributeBag' => __DIR__ . '/..' . '/symfony/http-foundation/Session/Attribute/NamespacedAttributeBag.php',
        'Symfony\\Component\\HttpFoundation\\Session\\Flash\\AutoExpireFlashBag' => __DIR__ . '/..' . '/symfony/http-foundation/Session/Flash/AutoExpireFlashBag.php',
        'Symfony\\Component\\HttpFoundation\\Session\\Flash\\FlashBag' => __DIR__ . '/..' . '/symfony/http-foundation/Session/Flash/FlashBag.php',
        'Symfony\\Component\\HttpFoundation\\Session\\Flash\\FlashBagInterface' => __DIR__ . '/..' . '/symfony/http-foundation/Session/Flash/FlashBagInterface.php',
        'Symfony\\Component\\HttpFoundation\\Session\\Session' => __DIR__ . '/..' . '/symfony/http-foundation/Session/Session.php',
        'Symfony\\Component\\HttpFoundation\\Session\\SessionBagInterface' => __DIR__ . '/..' . '/symfony/http-foundation/Session/SessionBagInterface.php',
        'Symfony\\Component\\HttpFoundation\\Session\\SessionInterface' => __DIR__ . '/..' . '/symfony/http-foundation/Session/SessionInterface.php',
        'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler\\MemcacheSessionHandler' => __DIR__ . '/..' . '/symfony/http-foundation/Session/Storage/Handler/MemcacheSessionHandler.php',
        'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler\\MemcachedSessionHandler' => __DIR__ . '/..' . '/symfony/http-foundation/Session/Storage/Handler/MemcachedSessionHandler.php',
        'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler\\MongoDbSessionHandler' => __DIR__ . '/..' . '/symfony/http-foundation/Session/Storage/Handler/MongoDbSessionHandler.php',
        'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler\\NativeFileSessionHandler' => __DIR__ . '/..' . '/symfony/http-foundation/Session/Storage/Handler/NativeFileSessionHandler.php',
        'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler\\NativeSessionHandler' => __DIR__ . '/..' . '/symfony/http-foundation/Session/Storage/Handler/NativeSessionHandler.php',
        'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler\\NullSessionHandler' => __DIR__ . '/..' . '/symfony/http-foundation/Session/Storage/Handler/NullSessionHandler.php',
        'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler\\PdoSessionHandler' => __DIR__ . '/..' . '/symfony/http-foundation/Session/Storage/Handler/PdoSessionHandler.php',
        'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler\\WriteCheckSessionHandler' => __DIR__ . '/..' . '/symfony/http-foundation/Session/Storage/Handler/WriteCheckSessionHandler.php',
        'Symfony\\Component\\HttpFoundation\\Session\\Storage\\MetadataBag' => __DIR__ . '/..' . '/symfony/http-foundation/Session/Storage/MetadataBag.php',
        'Symfony\\Component\\HttpFoundation\\Session\\Storage\\MockArraySessionStorage' => __DIR__ . '/..' . '/symfony/http-foundation/Session/Storage/MockArraySessionStorage.php',
        'Symfony\\Component\\HttpFoundation\\Session\\Storage\\MockFileSessionStorage' => __DIR__ . '/..' . '/symfony/http-foundation/Session/Storage/MockFileSessionStorage.php',
        'Symfony\\Component\\HttpFoundation\\Session\\Storage\\NativeSessionStorage' => __DIR__ . '/..' . '/symfony/http-foundation/Session/Storage/NativeSessionStorage.php',
        'Symfony\\Component\\HttpFoundation\\Session\\Storage\\PhpBridgeSessionStorage' => __DIR__ . '/..' . '/symfony/http-foundation/Session/Storage/PhpBridgeSessionStorage.php',
        'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Proxy\\AbstractProxy' => __DIR__ . '/..' . '/symfony/http-foundation/Session/Storage/Proxy/AbstractProxy.php',
        'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Proxy\\NativeProxy' => __DIR__ . '/..' . '/symfony/http-foundation/Session/Storage/Proxy/NativeProxy.php',
        'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Proxy\\SessionHandlerProxy' => __DIR__ . '/..' . '/symfony/http-foundation/Session/Storage/Proxy/SessionHandlerProxy.php',
        'Symfony\\Component\\HttpFoundation\\Session\\Storage\\SessionStorageInterface' => __DIR__ . '/..' . '/symfony/http-foundation/Session/Storage/SessionStorageInterface.php',
        'Symfony\\Component\\HttpFoundation\\StreamedResponse' => __DIR__ . '/..' . '/symfony/http-foundation/StreamedResponse.php',
        'Symfony\\Component\\Translation\\Catalogue\\AbstractOperation' => __DIR__ . '/..' . '/symfony/translation/Catalogue/AbstractOperation.php',
        'Symfony\\Component\\Translation\\Catalogue\\MergeOperation' => __DIR__ . '/..' . '/symfony/translation/Catalogue/MergeOperation.php',
        'Symfony\\Component\\Translation\\Catalogue\\OperationInterface' => __DIR__ . '/..' . '/symfony/translation/Catalogue/OperationInterface.php',
        'Symfony\\Component\\Translation\\Catalogue\\TargetOperation' => __DIR__ . '/..' . '/symfony/translation/Catalogue/TargetOperation.php',
        'Symfony\\Component\\Translation\\DataCollectorTranslator' => __DIR__ . '/..' . '/symfony/translation/DataCollectorTranslator.php',
        'Symfony\\Component\\Translation\\DataCollector\\TranslationDataCollector' => __DIR__ . '/..' . '/symfony/translation/DataCollector/TranslationDataCollector.php',
        'Symfony\\Component\\Translation\\Dumper\\CsvFileDumper' => __DIR__ . '/..' . '/symfony/translation/Dumper/CsvFileDumper.php',
        'Symfony\\Component\\Translation\\Dumper\\DumperInterface' => __DIR__ . '/..' . '/symfony/translation/Dumper/DumperInterface.php',
        'Symfony\\Component\\Translation\\Dumper\\FileDumper' => __DIR__ . '/..' . '/symfony/translation/Dumper/FileDumper.php',
        'Symfony\\Component\\Translation\\Dumper\\IcuResFileDumper' => __DIR__ . '/..' . '/symfony/translation/Dumper/IcuResFileDumper.php',
        'Symfony\\Component\\Translation\\Dumper\\IniFileDumper' => __DIR__ . '/..' . '/symfony/translation/Dumper/IniFileDumper.php',
        'Symfony\\Component\\Translation\\Dumper\\JsonFileDumper' => __DIR__ . '/..' . '/symfony/translation/Dumper/JsonFileDumper.php',
        'Symfony\\Component\\Translation\\Dumper\\MoFileDumper' => __DIR__ . '/..' . '/symfony/translation/Dumper/MoFileDumper.php',
        'Symfony\\Component\\Translation\\Dumper\\PhpFileDumper' => __DIR__ . '/..' . '/symfony/translation/Dumper/PhpFileDumper.php',
        'Symfony\\Component\\Translation\\Dumper\\PoFileDumper' => __DIR__ . '/..' . '/symfony/translation/Dumper/PoFileDumper.php',
        'Symfony\\Component\\Translation\\Dumper\\QtFileDumper' => __DIR__ . '/..' . '/symfony/translation/Dumper/QtFileDumper.php',
        'Symfony\\Component\\Translation\\Dumper\\XliffFileDumper' => __DIR__ . '/..' . '/symfony/translation/Dumper/XliffFileDumper.php',
        'Symfony\\Component\\Translation\\Dumper\\YamlFileDumper' => __DIR__ . '/..' . '/symfony/translation/Dumper/YamlFileDumper.php',
        'Symfony\\Component\\Translation\\Exception\\ExceptionInterface' => __DIR__ . '/..' . '/symfony/translation/Exception/ExceptionInterface.php',
        'Symfony\\Component\\Translation\\Exception\\InvalidResourceException' => __DIR__ . '/..' . '/symfony/translation/Exception/InvalidResourceException.php',
        'Symfony\\Component\\Translation\\Exception\\NotFoundResourceException' => __DIR__ . '/..' . '/symfony/translation/Exception/NotFoundResourceException.php',
        'Symfony\\Component\\Translation\\Extractor\\AbstractFileExtractor' => __DIR__ . '/..' . '/symfony/translation/Extractor/AbstractFileExtractor.php',
        'Symfony\\Component\\Translation\\Extractor\\ChainExtractor' => __DIR__ . '/..' . '/symfony/translation/Extractor/ChainExtractor.php',
        'Symfony\\Component\\Translation\\Extractor\\ExtractorInterface' => __DIR__ . '/..' . '/symfony/translation/Extractor/ExtractorInterface.php',
        'Symfony\\Component\\Translation\\IdentityTranslator' => __DIR__ . '/..' . '/symfony/translation/IdentityTranslator.php',
        'Symfony\\Component\\Translation\\Interval' => __DIR__ . '/..' . '/symfony/translation/Interval.php',
        'Symfony\\Component\\Translation\\Loader\\ArrayLoader' => __DIR__ . '/..' . '/symfony/translation/Loader/ArrayLoader.php',
        'Symfony\\Component\\Translation\\Loader\\CsvFileLoader' => __DIR__ . '/..' . '/symfony/translation/Loader/CsvFileLoader.php',
        'Symfony\\Component\\Translation\\Loader\\FileLoader' => __DIR__ . '/..' . '/symfony/translation/Loader/FileLoader.php',
        'Symfony\\Component\\Translation\\Loader\\IcuDatFileLoader' => __DIR__ . '/..' . '/symfony/translation/Loader/IcuDatFileLoader.php',
        'Symfony\\Component\\Translation\\Loader\\IcuResFileLoader' => __DIR__ . '/..' . '/symfony/translation/Loader/IcuResFileLoader.php',
        'Symfony\\Component\\Translation\\Loader\\IniFileLoader' => __DIR__ . '/..' . '/symfony/translation/Loader/IniFileLoader.php',
        'Symfony\\Component\\Translation\\Loader\\JsonFileLoader' => __DIR__ . '/..' . '/symfony/translation/Loader/JsonFileLoader.php',
        'Symfony\\Component\\Translation\\Loader\\LoaderInterface' => __DIR__ . '/..' . '/symfony/translation/Loader/LoaderInterface.php',
        'Symfony\\Component\\Translation\\Loader\\MoFileLoader' => __DIR__ . '/..' . '/symfony/translation/Loader/MoFileLoader.php',
        'Symfony\\Component\\Translation\\Loader\\PhpFileLoader' => __DIR__ . '/..' . '/symfony/translation/Loader/PhpFileLoader.php',
        'Symfony\\Component\\Translation\\Loader\\PoFileLoader' => __DIR__ . '/..' . '/symfony/translation/Loader/PoFileLoader.php',
        'Symfony\\Component\\Translation\\Loader\\QtFileLoader' => __DIR__ . '/..' . '/symfony/translation/Loader/QtFileLoader.php',
        'Symfony\\Component\\Translation\\Loader\\XliffFileLoader' => __DIR__ . '/..' . '/symfony/translation/Loader/XliffFileLoader.php',
        'Symfony\\Component\\Translation\\Loader\\YamlFileLoader' => __DIR__ . '/..' . '/symfony/translation/Loader/YamlFileLoader.php',
        'Symfony\\Component\\Translation\\LoggingTranslator' => __DIR__ . '/..' . '/symfony/translation/LoggingTranslator.php',
        'Symfony\\Component\\Translation\\MessageCatalogue' => __DIR__ . '/..' . '/symfony/translation/MessageCatalogue.php',
        'Symfony\\Component\\Translation\\MessageCatalogueInterface' => __DIR__ . '/..' . '/symfony/translation/MessageCatalogueInterface.php',
        'Symfony\\Component\\Translation\\MessageSelector' => __DIR__ . '/..' . '/symfony/translation/MessageSelector.php',
        'Symfony\\Component\\Translation\\MetadataAwareInterface' => __DIR__ . '/..' . '/symfony/translation/MetadataAwareInterface.php',
        'Symfony\\Component\\Translation\\PluralizationRules' => __DIR__ . '/..' . '/symfony/translation/PluralizationRules.php',
        'Symfony\\Component\\Translation\\Translator' => __DIR__ . '/..' . '/symfony/translation/Translator.php',
        'Symfony\\Component\\Translation\\TranslatorBagInterface' => __DIR__ . '/..' . '/symfony/translation/TranslatorBagInterface.php',
        'Symfony\\Component\\Translation\\TranslatorInterface' => __DIR__ . '/..' . '/symfony/translation/TranslatorInterface.php',
        'Symfony\\Component\\Translation\\Util\\ArrayConverter' => __DIR__ . '/..' . '/symfony/translation/Util/ArrayConverter.php',
        'Symfony\\Component\\Translation\\Writer\\TranslationWriter' => __DIR__ . '/..' . '/symfony/translation/Writer/TranslationWriter.php',
        'Symfony\\Polyfill\\Mbstring\\Mbstring' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/Mbstring.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0d141d32e9162f5c7415075a374fd261::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0d141d32e9162f5c7415075a374fd261::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0d141d32e9162f5c7415075a374fd261::$classMap;

        }, null, ClassLoader::class);
    }
}
