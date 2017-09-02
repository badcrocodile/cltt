<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'Acme\\AddComment' => $baseDir . '/src/AddComment.php',
    'Acme\\AddTime' => $baseDir . '/src/AddTime.php',
    'Acme\\ArchiveProject' => $baseDir . '/src/ArchiveProject.php',
    'Acme\\CalculateTime' => $baseDir . '/src/CalculateTime.php',
    'Acme\\Command' => $baseDir . '/src/Command.php',
    'Acme\\CsvResponse' => $baseDir . '/src/CsvResponse.php',
    'Acme\\DatabaseAdapter' => $baseDir . '/src/DatabaseAdapter.php',
    'Acme\\DaysOfWeek' => $baseDir . '/src/DaysOfWeek.php',
    'Acme\\DeleteTime' => $baseDir . '/src/DeleteTime.php',
    'Acme\\EditTime' => $baseDir . '/src/EditTime.php',
    'Acme\\ExportEntries' => $baseDir . '/src/ExportEntries.php',
    'Acme\\FormatTime' => $baseDir . '/src/FormatTime.php',
    'Acme\\NewProject' => $baseDir . '/src/NewProject.php',
    'Acme\\OutputMessage' => $baseDir . '/src/OutputMessage.php',
    'Acme\\RestoreProject' => $baseDir . '/src/RestoreProject.php',
    'Acme\\RunningTimers' => $baseDir . '/src/RunningTimers.php',
    'Acme\\Session' => $baseDir . '/src/Session.php',
    'Acme\\ShowDates' => $baseDir . '/src/ShowDates.php',
    'Acme\\ShowDay' => $baseDir . '/src/ShowDay.php',
    'Acme\\ShowProjects' => $baseDir . '/src/ShowProjects.php',
    'Acme\\ShowTimes' => $baseDir . '/src/ShowTimes.php',
    'Acme\\ShowWeek' => $baseDir . '/src/ShowWeek.php',
    'Acme\\StartProject' => $baseDir . '/src/StartProject.php',
    'Acme\\StopProject' => $baseDir . '/src/StopProject.php',
    'Carbon\\Carbon' => $vendorDir . '/nesbot/carbon/src/Carbon/Carbon.php',
    'Carbon\\CarbonInterval' => $vendorDir . '/nesbot/carbon/src/Carbon/CarbonInterval.php',
    'Carbon\\Exceptions\\InvalidDateException' => $vendorDir . '/nesbot/carbon/src/Carbon/Exceptions/InvalidDateException.php',
    'Psr\\Log\\AbstractLogger' => $vendorDir . '/psr/log/Psr/Log/AbstractLogger.php',
    'Psr\\Log\\InvalidArgumentException' => $vendorDir . '/psr/log/Psr/Log/InvalidArgumentException.php',
    'Psr\\Log\\LogLevel' => $vendorDir . '/psr/log/Psr/Log/LogLevel.php',
    'Psr\\Log\\LoggerAwareInterface' => $vendorDir . '/psr/log/Psr/Log/LoggerAwareInterface.php',
    'Psr\\Log\\LoggerAwareTrait' => $vendorDir . '/psr/log/Psr/Log/LoggerAwareTrait.php',
    'Psr\\Log\\LoggerInterface' => $vendorDir . '/psr/log/Psr/Log/LoggerInterface.php',
    'Psr\\Log\\LoggerTrait' => $vendorDir . '/psr/log/Psr/Log/LoggerTrait.php',
    'Psr\\Log\\NullLogger' => $vendorDir . '/psr/log/Psr/Log/NullLogger.php',
    'Psr\\Log\\Test\\DummyTest' => $vendorDir . '/psr/log/Psr/Log/Test/LoggerInterfaceTest.php',
    'Psr\\Log\\Test\\LoggerInterfaceTest' => $vendorDir . '/psr/log/Psr/Log/Test/LoggerInterfaceTest.php',
    'Symfony\\Component\\Console\\Application' => $vendorDir . '/symfony/console/Application.php',
    'Symfony\\Component\\Console\\Command\\Command' => $vendorDir . '/symfony/console/Command/Command.php',
    'Symfony\\Component\\Console\\Command\\HelpCommand' => $vendorDir . '/symfony/console/Command/HelpCommand.php',
    'Symfony\\Component\\Console\\Command\\ListCommand' => $vendorDir . '/symfony/console/Command/ListCommand.php',
    'Symfony\\Component\\Console\\Command\\LockableTrait' => $vendorDir . '/symfony/console/Command/LockableTrait.php',
    'Symfony\\Component\\Console\\ConsoleEvents' => $vendorDir . '/symfony/console/ConsoleEvents.php',
    'Symfony\\Component\\Console\\DependencyInjection\\AddConsoleCommandPass' => $vendorDir . '/symfony/console/DependencyInjection/AddConsoleCommandPass.php',
    'Symfony\\Component\\Console\\Descriptor\\ApplicationDescription' => $vendorDir . '/symfony/console/Descriptor/ApplicationDescription.php',
    'Symfony\\Component\\Console\\Descriptor\\Descriptor' => $vendorDir . '/symfony/console/Descriptor/Descriptor.php',
    'Symfony\\Component\\Console\\Descriptor\\DescriptorInterface' => $vendorDir . '/symfony/console/Descriptor/DescriptorInterface.php',
    'Symfony\\Component\\Console\\Descriptor\\JsonDescriptor' => $vendorDir . '/symfony/console/Descriptor/JsonDescriptor.php',
    'Symfony\\Component\\Console\\Descriptor\\MarkdownDescriptor' => $vendorDir . '/symfony/console/Descriptor/MarkdownDescriptor.php',
    'Symfony\\Component\\Console\\Descriptor\\TextDescriptor' => $vendorDir . '/symfony/console/Descriptor/TextDescriptor.php',
    'Symfony\\Component\\Console\\Descriptor\\XmlDescriptor' => $vendorDir . '/symfony/console/Descriptor/XmlDescriptor.php',
    'Symfony\\Component\\Console\\EventListener\\ErrorListener' => $vendorDir . '/symfony/console/EventListener/ErrorListener.php',
    'Symfony\\Component\\Console\\Event\\ConsoleCommandEvent' => $vendorDir . '/symfony/console/Event/ConsoleCommandEvent.php',
    'Symfony\\Component\\Console\\Event\\ConsoleErrorEvent' => $vendorDir . '/symfony/console/Event/ConsoleErrorEvent.php',
    'Symfony\\Component\\Console\\Event\\ConsoleEvent' => $vendorDir . '/symfony/console/Event/ConsoleEvent.php',
    'Symfony\\Component\\Console\\Event\\ConsoleExceptionEvent' => $vendorDir . '/symfony/console/Event/ConsoleExceptionEvent.php',
    'Symfony\\Component\\Console\\Event\\ConsoleTerminateEvent' => $vendorDir . '/symfony/console/Event/ConsoleTerminateEvent.php',
    'Symfony\\Component\\Console\\Exception\\CommandNotFoundException' => $vendorDir . '/symfony/console/Exception/CommandNotFoundException.php',
    'Symfony\\Component\\Console\\Exception\\ExceptionInterface' => $vendorDir . '/symfony/console/Exception/ExceptionInterface.php',
    'Symfony\\Component\\Console\\Exception\\InvalidArgumentException' => $vendorDir . '/symfony/console/Exception/InvalidArgumentException.php',
    'Symfony\\Component\\Console\\Exception\\InvalidOptionException' => $vendorDir . '/symfony/console/Exception/InvalidOptionException.php',
    'Symfony\\Component\\Console\\Exception\\LogicException' => $vendorDir . '/symfony/console/Exception/LogicException.php',
    'Symfony\\Component\\Console\\Exception\\RuntimeException' => $vendorDir . '/symfony/console/Exception/RuntimeException.php',
    'Symfony\\Component\\Console\\Formatter\\OutputFormatter' => $vendorDir . '/symfony/console/Formatter/OutputFormatter.php',
    'Symfony\\Component\\Console\\Formatter\\OutputFormatterInterface' => $vendorDir . '/symfony/console/Formatter/OutputFormatterInterface.php',
    'Symfony\\Component\\Console\\Formatter\\OutputFormatterStyle' => $vendorDir . '/symfony/console/Formatter/OutputFormatterStyle.php',
    'Symfony\\Component\\Console\\Formatter\\OutputFormatterStyleInterface' => $vendorDir . '/symfony/console/Formatter/OutputFormatterStyleInterface.php',
    'Symfony\\Component\\Console\\Formatter\\OutputFormatterStyleStack' => $vendorDir . '/symfony/console/Formatter/OutputFormatterStyleStack.php',
    'Symfony\\Component\\Console\\Helper\\DebugFormatterHelper' => $vendorDir . '/symfony/console/Helper/DebugFormatterHelper.php',
    'Symfony\\Component\\Console\\Helper\\DescriptorHelper' => $vendorDir . '/symfony/console/Helper/DescriptorHelper.php',
    'Symfony\\Component\\Console\\Helper\\FormatterHelper' => $vendorDir . '/symfony/console/Helper/FormatterHelper.php',
    'Symfony\\Component\\Console\\Helper\\Helper' => $vendorDir . '/symfony/console/Helper/Helper.php',
    'Symfony\\Component\\Console\\Helper\\HelperInterface' => $vendorDir . '/symfony/console/Helper/HelperInterface.php',
    'Symfony\\Component\\Console\\Helper\\HelperSet' => $vendorDir . '/symfony/console/Helper/HelperSet.php',
    'Symfony\\Component\\Console\\Helper\\InputAwareHelper' => $vendorDir . '/symfony/console/Helper/InputAwareHelper.php',
    'Symfony\\Component\\Console\\Helper\\ProcessHelper' => $vendorDir . '/symfony/console/Helper/ProcessHelper.php',
    'Symfony\\Component\\Console\\Helper\\ProgressBar' => $vendorDir . '/symfony/console/Helper/ProgressBar.php',
    'Symfony\\Component\\Console\\Helper\\ProgressIndicator' => $vendorDir . '/symfony/console/Helper/ProgressIndicator.php',
    'Symfony\\Component\\Console\\Helper\\QuestionHelper' => $vendorDir . '/symfony/console/Helper/QuestionHelper.php',
    'Symfony\\Component\\Console\\Helper\\SymfonyQuestionHelper' => $vendorDir . '/symfony/console/Helper/SymfonyQuestionHelper.php',
    'Symfony\\Component\\Console\\Helper\\Table' => $vendorDir . '/symfony/console/Helper/Table.php',
    'Symfony\\Component\\Console\\Helper\\TableCell' => $vendorDir . '/symfony/console/Helper/TableCell.php',
    'Symfony\\Component\\Console\\Helper\\TableSeparator' => $vendorDir . '/symfony/console/Helper/TableSeparator.php',
    'Symfony\\Component\\Console\\Helper\\TableStyle' => $vendorDir . '/symfony/console/Helper/TableStyle.php',
    'Symfony\\Component\\Console\\Input\\ArgvInput' => $vendorDir . '/symfony/console/Input/ArgvInput.php',
    'Symfony\\Component\\Console\\Input\\ArrayInput' => $vendorDir . '/symfony/console/Input/ArrayInput.php',
    'Symfony\\Component\\Console\\Input\\Input' => $vendorDir . '/symfony/console/Input/Input.php',
    'Symfony\\Component\\Console\\Input\\InputArgument' => $vendorDir . '/symfony/console/Input/InputArgument.php',
    'Symfony\\Component\\Console\\Input\\InputAwareInterface' => $vendorDir . '/symfony/console/Input/InputAwareInterface.php',
    'Symfony\\Component\\Console\\Input\\InputDefinition' => $vendorDir . '/symfony/console/Input/InputDefinition.php',
    'Symfony\\Component\\Console\\Input\\InputInterface' => $vendorDir . '/symfony/console/Input/InputInterface.php',
    'Symfony\\Component\\Console\\Input\\InputOption' => $vendorDir . '/symfony/console/Input/InputOption.php',
    'Symfony\\Component\\Console\\Input\\StreamableInputInterface' => $vendorDir . '/symfony/console/Input/StreamableInputInterface.php',
    'Symfony\\Component\\Console\\Input\\StringInput' => $vendorDir . '/symfony/console/Input/StringInput.php',
    'Symfony\\Component\\Console\\Logger\\ConsoleLogger' => $vendorDir . '/symfony/console/Logger/ConsoleLogger.php',
    'Symfony\\Component\\Console\\Output\\BufferedOutput' => $vendorDir . '/symfony/console/Output/BufferedOutput.php',
    'Symfony\\Component\\Console\\Output\\ConsoleOutput' => $vendorDir . '/symfony/console/Output/ConsoleOutput.php',
    'Symfony\\Component\\Console\\Output\\ConsoleOutputInterface' => $vendorDir . '/symfony/console/Output/ConsoleOutputInterface.php',
    'Symfony\\Component\\Console\\Output\\NullOutput' => $vendorDir . '/symfony/console/Output/NullOutput.php',
    'Symfony\\Component\\Console\\Output\\Output' => $vendorDir . '/symfony/console/Output/Output.php',
    'Symfony\\Component\\Console\\Output\\OutputInterface' => $vendorDir . '/symfony/console/Output/OutputInterface.php',
    'Symfony\\Component\\Console\\Output\\StreamOutput' => $vendorDir . '/symfony/console/Output/StreamOutput.php',
    'Symfony\\Component\\Console\\Question\\ChoiceQuestion' => $vendorDir . '/symfony/console/Question/ChoiceQuestion.php',
    'Symfony\\Component\\Console\\Question\\ConfirmationQuestion' => $vendorDir . '/symfony/console/Question/ConfirmationQuestion.php',
    'Symfony\\Component\\Console\\Question\\Question' => $vendorDir . '/symfony/console/Question/Question.php',
    'Symfony\\Component\\Console\\Style\\OutputStyle' => $vendorDir . '/symfony/console/Style/OutputStyle.php',
    'Symfony\\Component\\Console\\Style\\StyleInterface' => $vendorDir . '/symfony/console/Style/StyleInterface.php',
    'Symfony\\Component\\Console\\Style\\SymfonyStyle' => $vendorDir . '/symfony/console/Style/SymfonyStyle.php',
    'Symfony\\Component\\Console\\Terminal' => $vendorDir . '/symfony/console/Terminal.php',
    'Symfony\\Component\\Console\\Tester\\ApplicationTester' => $vendorDir . '/symfony/console/Tester/ApplicationTester.php',
    'Symfony\\Component\\Console\\Tester\\CommandTester' => $vendorDir . '/symfony/console/Tester/CommandTester.php',
    'Symfony\\Component\\Debug\\BufferingLogger' => $vendorDir . '/symfony/debug/BufferingLogger.php',
    'Symfony\\Component\\Debug\\Debug' => $vendorDir . '/symfony/debug/Debug.php',
    'Symfony\\Component\\Debug\\DebugClassLoader' => $vendorDir . '/symfony/debug/DebugClassLoader.php',
    'Symfony\\Component\\Debug\\ErrorHandler' => $vendorDir . '/symfony/debug/ErrorHandler.php',
    'Symfony\\Component\\Debug\\ExceptionHandler' => $vendorDir . '/symfony/debug/ExceptionHandler.php',
    'Symfony\\Component\\Debug\\Exception\\ClassNotFoundException' => $vendorDir . '/symfony/debug/Exception/ClassNotFoundException.php',
    'Symfony\\Component\\Debug\\Exception\\ContextErrorException' => $vendorDir . '/symfony/debug/Exception/ContextErrorException.php',
    'Symfony\\Component\\Debug\\Exception\\FatalErrorException' => $vendorDir . '/symfony/debug/Exception/FatalErrorException.php',
    'Symfony\\Component\\Debug\\Exception\\FatalThrowableError' => $vendorDir . '/symfony/debug/Exception/FatalThrowableError.php',
    'Symfony\\Component\\Debug\\Exception\\FlattenException' => $vendorDir . '/symfony/debug/Exception/FlattenException.php',
    'Symfony\\Component\\Debug\\Exception\\OutOfMemoryException' => $vendorDir . '/symfony/debug/Exception/OutOfMemoryException.php',
    'Symfony\\Component\\Debug\\Exception\\SilencedErrorContext' => $vendorDir . '/symfony/debug/Exception/SilencedErrorContext.php',
    'Symfony\\Component\\Debug\\Exception\\UndefinedFunctionException' => $vendorDir . '/symfony/debug/Exception/UndefinedFunctionException.php',
    'Symfony\\Component\\Debug\\Exception\\UndefinedMethodException' => $vendorDir . '/symfony/debug/Exception/UndefinedMethodException.php',
    'Symfony\\Component\\Debug\\FatalErrorHandler\\ClassNotFoundFatalErrorHandler' => $vendorDir . '/symfony/debug/FatalErrorHandler/ClassNotFoundFatalErrorHandler.php',
    'Symfony\\Component\\Debug\\FatalErrorHandler\\FatalErrorHandlerInterface' => $vendorDir . '/symfony/debug/FatalErrorHandler/FatalErrorHandlerInterface.php',
    'Symfony\\Component\\Debug\\FatalErrorHandler\\UndefinedFunctionFatalErrorHandler' => $vendorDir . '/symfony/debug/FatalErrorHandler/UndefinedFunctionFatalErrorHandler.php',
    'Symfony\\Component\\Debug\\FatalErrorHandler\\UndefinedMethodFatalErrorHandler' => $vendorDir . '/symfony/debug/FatalErrorHandler/UndefinedMethodFatalErrorHandler.php',
    'Symfony\\Component\\HttpFoundation\\AcceptHeader' => $vendorDir . '/symfony/http-foundation/AcceptHeader.php',
    'Symfony\\Component\\HttpFoundation\\AcceptHeaderItem' => $vendorDir . '/symfony/http-foundation/AcceptHeaderItem.php',
    'Symfony\\Component\\HttpFoundation\\ApacheRequest' => $vendorDir . '/symfony/http-foundation/ApacheRequest.php',
    'Symfony\\Component\\HttpFoundation\\BinaryFileResponse' => $vendorDir . '/symfony/http-foundation/BinaryFileResponse.php',
    'Symfony\\Component\\HttpFoundation\\Cookie' => $vendorDir . '/symfony/http-foundation/Cookie.php',
    'Symfony\\Component\\HttpFoundation\\Exception\\ConflictingHeadersException' => $vendorDir . '/symfony/http-foundation/Exception/ConflictingHeadersException.php',
    'Symfony\\Component\\HttpFoundation\\Exception\\RequestExceptionInterface' => $vendorDir . '/symfony/http-foundation/Exception/RequestExceptionInterface.php',
    'Symfony\\Component\\HttpFoundation\\Exception\\SuspiciousOperationException' => $vendorDir . '/symfony/http-foundation/Exception/SuspiciousOperationException.php',
    'Symfony\\Component\\HttpFoundation\\ExpressionRequestMatcher' => $vendorDir . '/symfony/http-foundation/ExpressionRequestMatcher.php',
    'Symfony\\Component\\HttpFoundation\\FileBag' => $vendorDir . '/symfony/http-foundation/FileBag.php',
    'Symfony\\Component\\HttpFoundation\\File\\Exception\\AccessDeniedException' => $vendorDir . '/symfony/http-foundation/File/Exception/AccessDeniedException.php',
    'Symfony\\Component\\HttpFoundation\\File\\Exception\\FileException' => $vendorDir . '/symfony/http-foundation/File/Exception/FileException.php',
    'Symfony\\Component\\HttpFoundation\\File\\Exception\\FileNotFoundException' => $vendorDir . '/symfony/http-foundation/File/Exception/FileNotFoundException.php',
    'Symfony\\Component\\HttpFoundation\\File\\Exception\\UnexpectedTypeException' => $vendorDir . '/symfony/http-foundation/File/Exception/UnexpectedTypeException.php',
    'Symfony\\Component\\HttpFoundation\\File\\Exception\\UploadException' => $vendorDir . '/symfony/http-foundation/File/Exception/UploadException.php',
    'Symfony\\Component\\HttpFoundation\\File\\File' => $vendorDir . '/symfony/http-foundation/File/File.php',
    'Symfony\\Component\\HttpFoundation\\File\\MimeType\\ExtensionGuesser' => $vendorDir . '/symfony/http-foundation/File/MimeType/ExtensionGuesser.php',
    'Symfony\\Component\\HttpFoundation\\File\\MimeType\\ExtensionGuesserInterface' => $vendorDir . '/symfony/http-foundation/File/MimeType/ExtensionGuesserInterface.php',
    'Symfony\\Component\\HttpFoundation\\File\\MimeType\\FileBinaryMimeTypeGuesser' => $vendorDir . '/symfony/http-foundation/File/MimeType/FileBinaryMimeTypeGuesser.php',
    'Symfony\\Component\\HttpFoundation\\File\\MimeType\\FileinfoMimeTypeGuesser' => $vendorDir . '/symfony/http-foundation/File/MimeType/FileinfoMimeTypeGuesser.php',
    'Symfony\\Component\\HttpFoundation\\File\\MimeType\\MimeTypeExtensionGuesser' => $vendorDir . '/symfony/http-foundation/File/MimeType/MimeTypeExtensionGuesser.php',
    'Symfony\\Component\\HttpFoundation\\File\\MimeType\\MimeTypeGuesser' => $vendorDir . '/symfony/http-foundation/File/MimeType/MimeTypeGuesser.php',
    'Symfony\\Component\\HttpFoundation\\File\\MimeType\\MimeTypeGuesserInterface' => $vendorDir . '/symfony/http-foundation/File/MimeType/MimeTypeGuesserInterface.php',
    'Symfony\\Component\\HttpFoundation\\File\\Stream' => $vendorDir . '/symfony/http-foundation/File/Stream.php',
    'Symfony\\Component\\HttpFoundation\\File\\UploadedFile' => $vendorDir . '/symfony/http-foundation/File/UploadedFile.php',
    'Symfony\\Component\\HttpFoundation\\HeaderBag' => $vendorDir . '/symfony/http-foundation/HeaderBag.php',
    'Symfony\\Component\\HttpFoundation\\IpUtils' => $vendorDir . '/symfony/http-foundation/IpUtils.php',
    'Symfony\\Component\\HttpFoundation\\JsonResponse' => $vendorDir . '/symfony/http-foundation/JsonResponse.php',
    'Symfony\\Component\\HttpFoundation\\ParameterBag' => $vendorDir . '/symfony/http-foundation/ParameterBag.php',
    'Symfony\\Component\\HttpFoundation\\RedirectResponse' => $vendorDir . '/symfony/http-foundation/RedirectResponse.php',
    'Symfony\\Component\\HttpFoundation\\Request' => $vendorDir . '/symfony/http-foundation/Request.php',
    'Symfony\\Component\\HttpFoundation\\RequestMatcher' => $vendorDir . '/symfony/http-foundation/RequestMatcher.php',
    'Symfony\\Component\\HttpFoundation\\RequestMatcherInterface' => $vendorDir . '/symfony/http-foundation/RequestMatcherInterface.php',
    'Symfony\\Component\\HttpFoundation\\RequestStack' => $vendorDir . '/symfony/http-foundation/RequestStack.php',
    'Symfony\\Component\\HttpFoundation\\Response' => $vendorDir . '/symfony/http-foundation/Response.php',
    'Symfony\\Component\\HttpFoundation\\ResponseHeaderBag' => $vendorDir . '/symfony/http-foundation/ResponseHeaderBag.php',
    'Symfony\\Component\\HttpFoundation\\ServerBag' => $vendorDir . '/symfony/http-foundation/ServerBag.php',
    'Symfony\\Component\\HttpFoundation\\Session\\Attribute\\AttributeBag' => $vendorDir . '/symfony/http-foundation/Session/Attribute/AttributeBag.php',
    'Symfony\\Component\\HttpFoundation\\Session\\Attribute\\AttributeBagInterface' => $vendorDir . '/symfony/http-foundation/Session/Attribute/AttributeBagInterface.php',
    'Symfony\\Component\\HttpFoundation\\Session\\Attribute\\NamespacedAttributeBag' => $vendorDir . '/symfony/http-foundation/Session/Attribute/NamespacedAttributeBag.php',
    'Symfony\\Component\\HttpFoundation\\Session\\Flash\\AutoExpireFlashBag' => $vendorDir . '/symfony/http-foundation/Session/Flash/AutoExpireFlashBag.php',
    'Symfony\\Component\\HttpFoundation\\Session\\Flash\\FlashBag' => $vendorDir . '/symfony/http-foundation/Session/Flash/FlashBag.php',
    'Symfony\\Component\\HttpFoundation\\Session\\Flash\\FlashBagInterface' => $vendorDir . '/symfony/http-foundation/Session/Flash/FlashBagInterface.php',
    'Symfony\\Component\\HttpFoundation\\Session\\Session' => $vendorDir . '/symfony/http-foundation/Session/Session.php',
    'Symfony\\Component\\HttpFoundation\\Session\\SessionBagInterface' => $vendorDir . '/symfony/http-foundation/Session/SessionBagInterface.php',
    'Symfony\\Component\\HttpFoundation\\Session\\SessionInterface' => $vendorDir . '/symfony/http-foundation/Session/SessionInterface.php',
    'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler\\MemcacheSessionHandler' => $vendorDir . '/symfony/http-foundation/Session/Storage/Handler/MemcacheSessionHandler.php',
    'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler\\MemcachedSessionHandler' => $vendorDir . '/symfony/http-foundation/Session/Storage/Handler/MemcachedSessionHandler.php',
    'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler\\MongoDbSessionHandler' => $vendorDir . '/symfony/http-foundation/Session/Storage/Handler/MongoDbSessionHandler.php',
    'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler\\NativeFileSessionHandler' => $vendorDir . '/symfony/http-foundation/Session/Storage/Handler/NativeFileSessionHandler.php',
    'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler\\NativeSessionHandler' => $vendorDir . '/symfony/http-foundation/Session/Storage/Handler/NativeSessionHandler.php',
    'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler\\NullSessionHandler' => $vendorDir . '/symfony/http-foundation/Session/Storage/Handler/NullSessionHandler.php',
    'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler\\PdoSessionHandler' => $vendorDir . '/symfony/http-foundation/Session/Storage/Handler/PdoSessionHandler.php',
    'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler\\WriteCheckSessionHandler' => $vendorDir . '/symfony/http-foundation/Session/Storage/Handler/WriteCheckSessionHandler.php',
    'Symfony\\Component\\HttpFoundation\\Session\\Storage\\MetadataBag' => $vendorDir . '/symfony/http-foundation/Session/Storage/MetadataBag.php',
    'Symfony\\Component\\HttpFoundation\\Session\\Storage\\MockArraySessionStorage' => $vendorDir . '/symfony/http-foundation/Session/Storage/MockArraySessionStorage.php',
    'Symfony\\Component\\HttpFoundation\\Session\\Storage\\MockFileSessionStorage' => $vendorDir . '/symfony/http-foundation/Session/Storage/MockFileSessionStorage.php',
    'Symfony\\Component\\HttpFoundation\\Session\\Storage\\NativeSessionStorage' => $vendorDir . '/symfony/http-foundation/Session/Storage/NativeSessionStorage.php',
    'Symfony\\Component\\HttpFoundation\\Session\\Storage\\PhpBridgeSessionStorage' => $vendorDir . '/symfony/http-foundation/Session/Storage/PhpBridgeSessionStorage.php',
    'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Proxy\\AbstractProxy' => $vendorDir . '/symfony/http-foundation/Session/Storage/Proxy/AbstractProxy.php',
    'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Proxy\\NativeProxy' => $vendorDir . '/symfony/http-foundation/Session/Storage/Proxy/NativeProxy.php',
    'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Proxy\\SessionHandlerProxy' => $vendorDir . '/symfony/http-foundation/Session/Storage/Proxy/SessionHandlerProxy.php',
    'Symfony\\Component\\HttpFoundation\\Session\\Storage\\SessionStorageInterface' => $vendorDir . '/symfony/http-foundation/Session/Storage/SessionStorageInterface.php',
    'Symfony\\Component\\HttpFoundation\\StreamedResponse' => $vendorDir . '/symfony/http-foundation/StreamedResponse.php',
    'Symfony\\Component\\Translation\\Catalogue\\AbstractOperation' => $vendorDir . '/symfony/translation/Catalogue/AbstractOperation.php',
    'Symfony\\Component\\Translation\\Catalogue\\MergeOperation' => $vendorDir . '/symfony/translation/Catalogue/MergeOperation.php',
    'Symfony\\Component\\Translation\\Catalogue\\OperationInterface' => $vendorDir . '/symfony/translation/Catalogue/OperationInterface.php',
    'Symfony\\Component\\Translation\\Catalogue\\TargetOperation' => $vendorDir . '/symfony/translation/Catalogue/TargetOperation.php',
    'Symfony\\Component\\Translation\\Command\\XliffLintCommand' => $vendorDir . '/symfony/translation/Command/XliffLintCommand.php',
    'Symfony\\Component\\Translation\\DataCollectorTranslator' => $vendorDir . '/symfony/translation/DataCollectorTranslator.php',
    'Symfony\\Component\\Translation\\DataCollector\\TranslationDataCollector' => $vendorDir . '/symfony/translation/DataCollector/TranslationDataCollector.php',
    'Symfony\\Component\\Translation\\Dumper\\CsvFileDumper' => $vendorDir . '/symfony/translation/Dumper/CsvFileDumper.php',
    'Symfony\\Component\\Translation\\Dumper\\DumperInterface' => $vendorDir . '/symfony/translation/Dumper/DumperInterface.php',
    'Symfony\\Component\\Translation\\Dumper\\FileDumper' => $vendorDir . '/symfony/translation/Dumper/FileDumper.php',
    'Symfony\\Component\\Translation\\Dumper\\IcuResFileDumper' => $vendorDir . '/symfony/translation/Dumper/IcuResFileDumper.php',
    'Symfony\\Component\\Translation\\Dumper\\IniFileDumper' => $vendorDir . '/symfony/translation/Dumper/IniFileDumper.php',
    'Symfony\\Component\\Translation\\Dumper\\JsonFileDumper' => $vendorDir . '/symfony/translation/Dumper/JsonFileDumper.php',
    'Symfony\\Component\\Translation\\Dumper\\MoFileDumper' => $vendorDir . '/symfony/translation/Dumper/MoFileDumper.php',
    'Symfony\\Component\\Translation\\Dumper\\PhpFileDumper' => $vendorDir . '/symfony/translation/Dumper/PhpFileDumper.php',
    'Symfony\\Component\\Translation\\Dumper\\PoFileDumper' => $vendorDir . '/symfony/translation/Dumper/PoFileDumper.php',
    'Symfony\\Component\\Translation\\Dumper\\QtFileDumper' => $vendorDir . '/symfony/translation/Dumper/QtFileDumper.php',
    'Symfony\\Component\\Translation\\Dumper\\XliffFileDumper' => $vendorDir . '/symfony/translation/Dumper/XliffFileDumper.php',
    'Symfony\\Component\\Translation\\Dumper\\YamlFileDumper' => $vendorDir . '/symfony/translation/Dumper/YamlFileDumper.php',
    'Symfony\\Component\\Translation\\Exception\\ExceptionInterface' => $vendorDir . '/symfony/translation/Exception/ExceptionInterface.php',
    'Symfony\\Component\\Translation\\Exception\\InvalidArgumentException' => $vendorDir . '/symfony/translation/Exception/InvalidArgumentException.php',
    'Symfony\\Component\\Translation\\Exception\\InvalidResourceException' => $vendorDir . '/symfony/translation/Exception/InvalidResourceException.php',
    'Symfony\\Component\\Translation\\Exception\\LogicException' => $vendorDir . '/symfony/translation/Exception/LogicException.php',
    'Symfony\\Component\\Translation\\Exception\\NotFoundResourceException' => $vendorDir . '/symfony/translation/Exception/NotFoundResourceException.php',
    'Symfony\\Component\\Translation\\Exception\\RuntimeException' => $vendorDir . '/symfony/translation/Exception/RuntimeException.php',
    'Symfony\\Component\\Translation\\Extractor\\AbstractFileExtractor' => $vendorDir . '/symfony/translation/Extractor/AbstractFileExtractor.php',
    'Symfony\\Component\\Translation\\Extractor\\ChainExtractor' => $vendorDir . '/symfony/translation/Extractor/ChainExtractor.php',
    'Symfony\\Component\\Translation\\Extractor\\ExtractorInterface' => $vendorDir . '/symfony/translation/Extractor/ExtractorInterface.php',
    'Symfony\\Component\\Translation\\IdentityTranslator' => $vendorDir . '/symfony/translation/IdentityTranslator.php',
    'Symfony\\Component\\Translation\\Interval' => $vendorDir . '/symfony/translation/Interval.php',
    'Symfony\\Component\\Translation\\Loader\\ArrayLoader' => $vendorDir . '/symfony/translation/Loader/ArrayLoader.php',
    'Symfony\\Component\\Translation\\Loader\\CsvFileLoader' => $vendorDir . '/symfony/translation/Loader/CsvFileLoader.php',
    'Symfony\\Component\\Translation\\Loader\\FileLoader' => $vendorDir . '/symfony/translation/Loader/FileLoader.php',
    'Symfony\\Component\\Translation\\Loader\\IcuDatFileLoader' => $vendorDir . '/symfony/translation/Loader/IcuDatFileLoader.php',
    'Symfony\\Component\\Translation\\Loader\\IcuResFileLoader' => $vendorDir . '/symfony/translation/Loader/IcuResFileLoader.php',
    'Symfony\\Component\\Translation\\Loader\\IniFileLoader' => $vendorDir . '/symfony/translation/Loader/IniFileLoader.php',
    'Symfony\\Component\\Translation\\Loader\\JsonFileLoader' => $vendorDir . '/symfony/translation/Loader/JsonFileLoader.php',
    'Symfony\\Component\\Translation\\Loader\\LoaderInterface' => $vendorDir . '/symfony/translation/Loader/LoaderInterface.php',
    'Symfony\\Component\\Translation\\Loader\\MoFileLoader' => $vendorDir . '/symfony/translation/Loader/MoFileLoader.php',
    'Symfony\\Component\\Translation\\Loader\\PhpFileLoader' => $vendorDir . '/symfony/translation/Loader/PhpFileLoader.php',
    'Symfony\\Component\\Translation\\Loader\\PoFileLoader' => $vendorDir . '/symfony/translation/Loader/PoFileLoader.php',
    'Symfony\\Component\\Translation\\Loader\\QtFileLoader' => $vendorDir . '/symfony/translation/Loader/QtFileLoader.php',
    'Symfony\\Component\\Translation\\Loader\\XliffFileLoader' => $vendorDir . '/symfony/translation/Loader/XliffFileLoader.php',
    'Symfony\\Component\\Translation\\Loader\\YamlFileLoader' => $vendorDir . '/symfony/translation/Loader/YamlFileLoader.php',
    'Symfony\\Component\\Translation\\LoggingTranslator' => $vendorDir . '/symfony/translation/LoggingTranslator.php',
    'Symfony\\Component\\Translation\\MessageCatalogue' => $vendorDir . '/symfony/translation/MessageCatalogue.php',
    'Symfony\\Component\\Translation\\MessageCatalogueInterface' => $vendorDir . '/symfony/translation/MessageCatalogueInterface.php',
    'Symfony\\Component\\Translation\\MessageSelector' => $vendorDir . '/symfony/translation/MessageSelector.php',
    'Symfony\\Component\\Translation\\MetadataAwareInterface' => $vendorDir . '/symfony/translation/MetadataAwareInterface.php',
    'Symfony\\Component\\Translation\\PluralizationRules' => $vendorDir . '/symfony/translation/PluralizationRules.php',
    'Symfony\\Component\\Translation\\Translator' => $vendorDir . '/symfony/translation/Translator.php',
    'Symfony\\Component\\Translation\\TranslatorBagInterface' => $vendorDir . '/symfony/translation/TranslatorBagInterface.php',
    'Symfony\\Component\\Translation\\TranslatorInterface' => $vendorDir . '/symfony/translation/TranslatorInterface.php',
    'Symfony\\Component\\Translation\\Util\\ArrayConverter' => $vendorDir . '/symfony/translation/Util/ArrayConverter.php',
    'Symfony\\Component\\Translation\\Writer\\TranslationWriter' => $vendorDir . '/symfony/translation/Writer/TranslationWriter.php',
    'Symfony\\Polyfill\\Mbstring\\Mbstring' => $vendorDir . '/symfony/polyfill-mbstring/Mbstring.php',
);
