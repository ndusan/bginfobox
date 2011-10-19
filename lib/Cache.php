<?php
/**
 * Cache
 * @author ndusan@gmailc.om
 *
 */
class Cache {

        /**
         * Set data in CACHE
         * @param array $params
         * @param array $ttl
         * @return array
         */
        public static function set($params, $ttl = TIME_TO_LIVE_CACHE){
                
                $fileName = CACHE_PATH.md5($params['key']);
                //Found file
                if(!$h = fopen($fileName, "a+")) throw new Exception('Could not write cache');
                
                // exclusive lock, will get released when the file is closed
                flock($h, LOCK_EX);
                fseek($h, 0);
                ftruncate($h, 0);
                
                $data = serialize(array('ttl' => time() + $ttl, 'data' => $params['data']));
                
                //Write data in file
                if(!fwrite($h, $data)) throw new Exception('Problem with writting in file');
                flock($h, LOCK_UN); // release the lock
                fclose($h);
                
                chmod($fileName, 0777);
                return true;
        }
        
        /**
         * Get data from CACHE
         * @param $params
         * @return array
         */
        public static function get($params){
                
                $fileName = CACHE_PATH.md5($params['key']);
                
                if(!file_exists($fileName)) return false;
                
                $h = fopen($fileName, "r");
                
                if(!$h) return false;
                
                // Getting a shared lock 
                flock($h, LOCK_SH);
                
                $data = file_get_contents($fileName);
                fclose($h);
                
                if(!$data = @unserialize($data)){
                        
                        //Remove file
                        unlink($fileName);
                        return false;
                }
                
                if(time() > $data['ttl']){
                        
                        //File expired
                        unlink($fileName);
                        return false;
                }
                
                return $data['data'];
                
        }
        
        /**
         * Remove file from CACHE
         * @param array $params
         * @return array
         */
        public static function delete($params){
                
                $fileName = CACHE_PATH.md5($params['key']);
                
                if(!$fileName) return false;
                
                unlink($fileName);
                return true;
        }

}