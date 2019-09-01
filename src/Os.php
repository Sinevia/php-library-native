<?php
// ========================================================================= //
// SINEVIA CONFIDENTIAL                                  http://sinevia.com  //
// ------------------------------------------------------------------------- //
// COPYRIGHT (c) 2019 Sinevia Ltd                   All rights reserved //
// ------------------------------------------------------------------------- //
// LICENCE: All information contained herein is, and remains, property of    //
// Sinevia Ltd at all times.  Any intellectual and technical concepts        //
// are proprietary to Sinevia Ltd and may be covered by existing patents,    //
// patents in process, and are protected by trade secret or copyright law.   //
// Dissemination or reproduction of this information is strictly forbidden   //
// unless prior written permission is obtained from Sinevia Ltd per domain.  //
//===========================================================================//
namespace Sinevia;

class Os {
    public static $logEcho = false;
    public static $logFile = '';
    
    public static function directoryMergeRecursive($sourceDir, $destinationDir) {
        if (self::isWindows()) {
            return self::directoryMergeRecursiveWindows($sourceDir, $destinationDir);
        } else {
            return self::directoryMergeRecursiveLinux($sourceDir, $destinationDir);
        }
    }

    public static function directoryDeleteRecursive($sourceDir) {
        if (self::isWindows()) {
            return self::directoryDeleteRecursiveWindows($sourceDir);
        } else {
            return self::directoryDeleteRecursiveLinux($sourceDir);
        }
    }
    
    public static function exec($command) {
        self::log(' - Executing command: "' . $command . '"');

        exec($command, $out, $return);
        self::log($out);

        return $return == 0 ? true : false;
    }
    
    public static function isWindows() {
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            return true;
        }
        return false;
    }
  
    private static function directoryDeleteRecursiveLinux($sourceDir){
        $cmd = 'rm -rf ' . $sourceDir . '"';
        return self::exec($cmd);
    }
  
    private static function directoryDeleteRecursiveWindows($sourceDir){
        $sourceDirPathFixed = str_replace('/', DIRECTORY_SEPARATOR, $sourceDir);
        $cmd = 'rmdir "' . $sourceDirPathFixed . '" /s /q';
        return self::exec($cmd);
    }
  
    private static function directoryMergeRecursiveLinux($sourceDir, $destinationDir){
    }
  
    private static function directoryMergeRecursiveWindows($sourceDir, $destinationDir){
    }
    
    private static function log($msg) {
        if (is_array($msg)) {
            foreach ($msg as $m) {
                self::log($m);
            }
            return;
        }
        
        $message = date('Y-m-d H:i:s: ') . $msg . "\n";
        
        if (self::$logEcho) {
            echo $message;
        }
        
        if (self::$logFile) {
            file_put_contents(self::$logFile, $message, FILE_APPEND);
        }
    }
}
