This file keeps track of the "Import from HTML to Docbook" status, for each section of the manual.

# Merge from SVN #

Last revision merged from SVN: `1338`


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
 - `GitBranchTask` : `DONE` - *2011-09-10*
 - `GitFetchTask` : `DONE` - *2011-09-10*
 - `GitCheckoutTask` : `DONE` - *2011-09-10*
 - `GitMergeTask` : `DONE` - *2011-09-10*
 - `GitPullTask` : `DONE` - *2011-09-10*
 - `GitPushTask` : `DONE` - *2011-09-10*
 - `GitTagTask` : `DONE` - *2011-09-10*
 - `GitLogTask` : `DONE` - *2011-09-10*
 - `HttpGetTask` : `DONE` - *2011-09-10*
 - `HttpRequestTask` : `DONE` - *2011-09-10*
 - `IoncubeEncoderTask` : `DONE` - *2011-09-10*
 - `IoncubeLicenseTask` : `DONE` - *2011-09-10*
 - `JslLintTask` : `DONE` - *2011-09-10*
 - `JsMinTask` : `DONE` - *2011-09-10*
 - `MailTask` : `DONE` - *2011-09-10*
 - `PatchTask` : `DONE` - *2011-09-10*
 - `PDOSQLExecTask` : `DONE` - *2011-09-10*
 - `PearPackageTask` : `DONE` - *2011-09-10*
 - `PearPackage2Task` : `DONE` - *2011-09-10*
 - `PharPackageTask` : `DONE` - *2011-09-10*
 - `PhkPackageTask` : `DONE` - *2011-09-10*
 - `PhpCodeSnifferTask` : `DONE` - *2011-09-11*
 - `PHPCPDTask` : `DONE` - *2011-09-11*
 - `PHPMDTask` : `DONE` - *2011-09-11*
 - `PhpDependTask` : `DONE` - *2011-09-11*
 - `PhpDocumentorTask` : `DONE` - *2011-09-11*
 - `PhpDocumentorExternalTask` : `DONE` - *2011-09-11*
 - `PhpLintTask` : `DONE` - *2011-09-11*
 - `PHPUnitTask` : `DONE` - *2011-09-11*
 - `PHPUnitReport` : `DONE` - *2011-09-11*
 - `rSTTask` : `DONE` - *2011-09-11*
 - `S3PutTask` : `DONE` - *2011-09-11*
 - `S3GetTask` : `DONE` - *2011-09-11*
 - `ScpTask` : `DONE` - *2011-09-11*
 - `SshTask` : `DONE` - *2011-09-11*
 - `SimpleTestTask` : `DONE` - *2011-09-11*
 - `SvnCheckoutTask` : `DONE` - *2011-09-11*
 - `SvnCommitTask` : `DONE` - *2011-09-11*
 - `SvnCopyTask` : `DONE` - *2011-09-11*
 - `SvnExportTask` : `DONE` - *2011-09-11*
 - `SvnLastRevisionTask` : `DONE` - *2011-09-11*
 - `SvnListTask` : `DONE` - *2011-09-11*
 - `SvnLogTask` : `DONE` - *2011-09-11*
 - `SvnUpdateTask` : `DONE` - *2011-09-11*
 - `SvnSwitchTask` : `DONE` - *2011-09-11*
 - `SymlinkTask` : `DONE` - *2011-09-11*
 - `TarTask` : `DONE` - *2011-09-11*
 - `UntarTask` : `DONE` - *2011-09-11*
 - `UnzipTask` : `DONE` - *2011-09-11*
 - `VersionTask` : `DONE` - *2011-09-11*
 - `XmlLintTask` : `DONE` - *2011-09-11*
 - `XmlPropertyTask` : `DONE` - *2011-09-11*
 - `ZendCodeAnalyzerTask` : `DONE` - *2011-09-11*
 - `ZendGuardEncodeTask` : `DONE` - *2011-09-11*
 - `ZendGuardLicenseTask` : `DONE` - *2011-09-11*
 - `ZipTask` : `DONE` - *2011-09-11*



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


