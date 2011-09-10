This file keeps track of the "Import from HTML to Docbook" status, for each section of the manual.

# Possible statuses #

 - `TODO` : The section has not been imported to docbook, or nothing more than a skeleton *(mostly empty file)* is done
 - `WIP` : The import is in progress *(someone is working on it; and there is no need for anyone else to do the same)*
 - `IMPORTED` : The section's content has been imported; there might be some styling work left to do
 - `STYLING` : The section is being styled *(docbook tags are being added/modified, so the markup is closer to the meaning)*
 - `DONE` : The section has been imported, and styled; and can be published.


# Chapters #

 - `about-this-book` : `DONE` - *2011-08-20*
 - `introduction` : `DONE` - *2011-08-20*
 - `setting-up-phing` : `DONE` - *2011-08-20*
 - `getting-started` : `DONE` - *2011-08-20*
 - `project-components` : `DONE` - *2011-08-20*
 - `extending-phing` : `DONE` - *2011-08-20*
 - `bibliography` : `IMPORTED` - *2011-08-20*



# Appendices #

 - `fact-sheet` : `DONE` - *2011-08-20*
 - `core-tasks` : `DONE` - *2011-08-20*
 - `optional-tasks` : `DONE` - *2011-08-20*
 - `core-types` : `DONE` - *2011-08-20*
 - `core-filters` : `DONE` - *2011-08-20*
 - `core-mappers` : `DONE` - *2011-08-20*
 - `selectors` : `DONE` - *2011-08-20*
 - `project-components` : `DONE` - *2011-08-20*
 - `file-formats` : `DONE` - *2011-08-20*

## Core Tasks ##

 - `AdhocTaskdefTask` : `DONE` - *2011-08-25*
 - `AdhocTypedefTask` : `DONE` - *2011-08-25*
 - `AppendTask` : `DONE` - *2011-08-25*
 - `AvailableTask` : `DONE` - *2011-08-25*
 - `ChmodTask` : `DONE` - *2011-08-25*
 - `ChownTask` : `DONE` - *2011-08-25*
 - `ConditionTask` : `DONE` - *2011-08-26*
 - `CopyTask` : `DONE` - *2011-08-26*
 - `CvsTask` : `DONE` - *2011-08-28*
 - `CvsPassTask` : `DONE` - *2011-08-28*
 - `DeleteTask` : `DONE` - *2011-08-28*
 - `EchoTask` : `DONE` - *2011-08-28*
 - `ExecTask` : `DONE` - *2011-08-28*
 - `ExitTask` : `DONE` - *2011-08-28*
 - `ForeachTask` : `DONE` - *2011-08-28*
 - `IfTask` : `DONE` - *2011-08-28*
 - `ImportTask` : `DONE` - *2011-08-28*
 - `IncludePathTask` : `DONE` - *2011-08-28*
 - `InputTask` : `DONE` - *2011-08-28*
 - `LoadFileTask` : `DONE` - *2011-08-28*
 - `MkdirTask` : `DONE` - *2011-08-28*
 - `MoveTask` : `DONE` - *2011-08-28*
 - `PhingTask` : `DONE` - *2011-08-28*
 - `PhingCallTask` : `DONE` - *2011-08-28*
 - `PhpEvalTask` : `DONE` - *2011-08-28*
 - `PropertyTask` : `DONE` - *2011-08-28*
 - `PropertyPromptTask` : `DONE` - *2011-08-28*
 - `ReflexiveTask` : `DONE` - *2011-08-28*
 - `ResolvePathTask` : `DONE` - *2011-08-28*
 - `TaskdefTask` : `DONE` - *2011-08-28*
 - `TouchTask` : `DONE` - *2011-08-28*
 - `TstampTask` : `DONE` - *2011-08-28*
 - `TypedefTask` : `DONE` - *2011-08-28*
 - `UpToDateTask` : `DONE` - *2011-08-28*
 - `XsltTask` : `DONE` - *2011-08-28*


## Optional Tasks ##

 - `CoverageMergerTask` : `DONE` - *2011-09-09*
 - `CoverageReportTask` : `DONE` - *2011-09-09*
 - `CoverageSetupTask` : `DONE` - *2011-09-09*
 - `CoverageThresholdTask` : `DONE` - *2011-09-09*
 - `DbDeployTask` : `DONE` - *2011-09-09*
 - `DocBloxTask` : `DONE` - *2011-09-10*
 - `ExportPropertiesTask` : `DONE` - *2011-09-10*
 - `FileHashTask` : `DONE` - *2011-09-10*
 - `FileSizeTask` : `DONE` - *2011-09-10*
 - `FtpDeployTask` : `DONE` - *2011-09-10*
 - `GitInitTask` : `DONE` - *2011-09-10*
 - `GitCloneTask` : `DONE` - *2011-09-10*
 - `GitGcTask` : `DONE` - *2011-09-10*
 - `GitBranchTask` : `TODO` - *2011-08-20*
 - `GitFetchTask` : `TODO` - *2011-08-20*
 - `GitCheckoutTask` : `TODO` - *2011-08-20*
 - `GitMergeTask` : `TODO` - *2011-08-20*
 - `GitPullTask` : `TODO` - *2011-08-20*
 - `GitPushTask` : `TODO` - *2011-08-20*
 - `GitTagTask` : `TODO` - *2011-08-20*
 - `GitLogTask` : `TODO` - *2011-08-20*
 - `HttpGetTask` : `TODO` - *2011-08-20*
 - `HttpRequestTask` : `TODO` - *2011-08-20*
 - `IoncubeEncoderTask` : `TODO` - *2011-08-20*
 - `IoncubeLicenseTask` : `TODO` - *2011-08-20*
 - `JslLintTask` : `TODO` - *2011-08-20*
 - `JsMinTask` : `TODO` - *2011-08-20*
 - `MailTask` : `TODO` - *2011-08-20*
 - `PatchTask` : `TODO` - *2011-08-20*
 - `PDOSQLExecTask` : `TODO` - *2011-08-20*
 - `PearPackageTask` : `TODO` - *2011-08-20*
 - `PearPackage2Task` : `TODO` - *2011-08-20*
 - `PharPackageTask` : `TODO` - *2011-08-20*
 - `PhkPackageTask` : `TODO` - *2011-08-20*
 - `PhpCodeSnifferTask` : `TODO` - *2011-08-20*
 - `PHPCPDTask` : `TODO` - *2011-08-20*
 - `PHPMDTask` : `TODO` - *2011-08-20*
 - `PhpDependTask` : `TODO` - *2011-08-20*
 - `PhpDocumentorTask` : `TODO` - *2011-08-20*
 - `PhpDocumentorExternalTask` : `TODO` - *2011-08-20*
 - `PhpLintTask` : `TODO` - *2011-08-20*
 - `PHPUnitTask` : `TODO` - *2011-08-20*
 - `PHPUnitReport` : `TODO` - *2011-08-20*
 - `rSTTask` : `TODO` - *2011-08-20*
 - `S3PutTask` : `TODO` - *2011-08-20*
 - `S3GetTask` : `TODO` - *2011-08-20*
 - `ScpTask` : `TODO` - *2011-08-20*
 - `SshTask` : `TODO` - *2011-08-20*
 - `SimpleTestTask` : `TODO` - *2011-08-20*
 - `SvnCheckoutTask` : `TODO` - *2011-08-20*
 - `SvnCommitTask` : `TODO` - *2011-08-20*
 - `SvnCopyTask` : `TODO` - *2011-08-20*
 - `SvnExportTask` : `TODO` - *2011-08-20*
 - `SvnLastRevisionTask` : `TODO` - *2011-08-20*
 - `SvnListTask` : `TODO` - *2011-08-20*
 - `SvnLogTask` : `TODO` - *2011-08-20*
 - `SvnUpdateTask` : `TODO` - *2011-08-20*
 - `SvnSwitchTask` : `TODO` - *2011-08-20*
 - `SymlinkTask` : `TODO` - *2011-08-20*
 - `TarTask` : `TODO` - *2011-08-20*
 - `UntarTask` : `TODO` - *2011-08-20*
 - `UnzipTask` : `TODO` - *2011-08-20*
 - `VersionTask` : `TODO` - *2011-08-20*
 - `XmlLintTask` : `TODO` - *2011-08-20*
 - `XmlPropertyTask` : `TODO` - *2011-08-20*
 - `ZendCodeAnalyzerTask` : `TODO` - *2011-08-20*
 - `ZendGuardEncodeTask` : `TODO` - *2011-08-20*
 - `ZendGuardLicenseTask` : `TODO` - *2011-08-20*
 - `ZipTask` : `TODO` - *2011-08-20*



## Core Types ##

 - `FileList` : `DONE` - *2011-08-20*
 - `FileSet` : `DONE` - *2011-08-20*
 - `PatternSet` : `DONE` - *2011-08-20*
 - `Path / Classpath` : `DONE` - *2011-08-20*


## Core Filters ##

 - `PhingFilterReader` : `DONE` - *2011-08-24*
 - `ExpandProperties` : `DONE` - *2011-08-24*
 - `HeadFilter` : `DONE` - *2011-08-24*
 - `IconvFilter` : `DONE` - *2011-08-24*
 - `LineContains` : `DONE` - *2011-08-24*
 - `LineContainsRegexp` : `DONE` - *2011-08-24*
 - `PrefixLines` : `DONE` - *2011-08-24*
 - `ReplaceTokens` : `DONE` - *2011-08-24*
 - `ReplaceTokensWithFile` : `DONE` - *2011-08-24*
 - `ReplaceRegexp` : `DONE` - *2011-08-24*
 - `StripLineBreaks` : `DONE` - *2011-08-25*
 - `StripLineComments` : `DONE` - *2011-08-25*
 - `StripPhpComments` : `DONE` - *2011-08-25*
 - `StripWhitespace` : `DONE` - *2011-08-25*
 - `TabToSpaces` : `DONE` - *2011-08-25*
 - `TailFilter` : `DONE` - *2011-08-25*
 - `TidyFilter` : `DONE` - *2011-08-25*
 - `XincludeFilter` : `DONE` - *2011-08-25*
 - `XsltFilter` : `DONE` - *2011-08-25*


# Core Mappers ##

 - `FlattenMapper` : `DONE` - *2011-08-24*
 - `GlobMapper` : `DONE` - *2011-08-24*
 - `IdentityMapper` : `DONE` - *2011-08-24*
 - `MergeMapper` : `DONE` - *2011-08-24*
 - `RegexpMapper` : `DONE` - *2011-08-24*


## Selectors ##

 - `Contains` : `DONE` - *2011-08-23*
 - `Date` : `DONE` - *2011-08-23*
 - `Depend` : `DONE` - *2011-08-23*
 - `Depth` : `DONE` - *2011-08-24*
 - `Filename` : `DONE` - *2011-08-24*
 - `Present` : `DONE` - *2011-08-24*
 - `Containsregexp` : `DONE` - *2011-08-24*
 - `Size` : `DONE` - *2011-08-24*
 - `Type` : `DONE` - *2011-08-24*
 - `And` : `DONE` - *2011-08-24*
 - `Majority` : `DONE` - *2011-08-24*
 - `None` : `DONE` - *2011-08-24*
 - `Not` : `DONE` - *2011-08-24*
 - `Or` : `DONE` - *2011-08-24*
 - `Selector` : `DONE` - *2011-08-24*


## Project Components ##

 - `Phing Projects` : `DONE` - *2011-08-20*
 - `Targets` : `DONE` - *2011-08-20*


