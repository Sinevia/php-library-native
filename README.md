# PHP Library Native
Using the native functions of the operating system to boost speed

## Background ##

## Installation ##

Using composer

```
composer require sinevia/php-library-native
```

## Usage ##

```
echo \Sinevia\Native::userHome();
```

## Methods ##

In alphabetical order

- commandExists($command) {

- directoryClean($directoryPath)

- directoryCreate($directoryPath)

- directoryCopyRecursive($sourceDirectoryPath, $destinationDirectoryPath, $force = false)

- directoryMergeRecursive($sourceDirectoryPath, $destinationDirectoryPath)

- directoryDeleteRecursive($directoryPath)

- exec($command)
  - result in $lastExecOut

- fileCopy($srcFilePath, $targetFilePath)

- fileDelete($filePath)

- fileReplaceText($filePath, $string, $replacement)

- fileReplaceTextRegex($filePath, $regex, $replacement)
  
- isLinux() {

- isOsx()

- isWindows()

- userHome()

