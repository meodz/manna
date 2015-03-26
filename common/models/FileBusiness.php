<?php

namespace common\models\business;

use common\models\db\Site;
use common\models\output\Response;
use common\util\TextUtils;

class FileBusiness {

    private static $root = "/models/crawl";

    /**
     * opent file
     * @param Site $site
     * @return Response
     */
    public static function open(Site $site) {
        self::$root = \Yii::getAlias('@common') . '/models/crawl';
        if ($site == null) {
            return new Response(false, "Website created requested file was not created");
        }
        if ($site->active == 0) {
            return new Response(false, "Website asked to create temporary file is currently locked");
        }
        $class = ucwords(TextUtils::removeMarks($site->domain));
        $path = self::$root . '/' . $class . '.php';
        $data = "";
        if (!file_exists($path)) {
            $data = file_get_contents(self::$root . '/DefaultCrawl.php');
            $data = str_replace("DefaultCrawl", $class, $data);
        } else {
            $data = file_get_contents($path);
        }
        $data = preg_replace('/@save\((.*)\)/', '@save(' . \Yii::$app->user->getId() . ')', $data);
        $data = preg_replace('/@time\((.*)\)/', '@time(' . date("H:i:s d/m/Y") . ')', $data);
        $data = preg_replace('/@site\((.*)\)/', '@site(' . $site->domain . ')', $data);
        return new Response(true, "Data in file open", $data);
    }

    /**
     * save file
     * @param Site $site
     * @param string $data
     * @return Response
     */
    public static function save(Site $site, $data) {
        self::$root = \Yii::getAlias('@common') . '/models/crawl';
        if ($site == null || $data == null) {
            return new Response(false, "Website or data created requested file was not created");
        }
        if ($site->active == 0) {
            return new Response(false, "Website asked to create temporary file is currently locked");
        }
        try {
            $path = self::$root . '/' . ucwords(TextUtils::removeMarks($site->domain)) . '.php';
            $file = fopen($path, "w");
            fwrite($file, $data);
            fclose($file);
            //chmod($path, 0777); 
            return new Response(true, "Save file " . $path . ' success');
        } catch (\Exception $exc) {
            return new Response(false, $exc->getMessage());
        }
    }

    /**
     * check exit file by domain
     * @param type $domain
     * @return type
     */
    public static function exits($domain) {
        self::$root = \Yii::getAlias('@common') . '/models/crawl';
        $resp = [];
        $resp['entity'] = $domain;
        $path = self::$root . '/' . ucwords(TextUtils::removeMarks($domain)) . '.php';
        $resp['exits'] = file_exists($path);
        try {
            $class = new \ReflectionClass('common\\models\\crawl\\' . ucwords(TextUtils::removeMarks($domain)));
            preg_match('/@save\((.*)\)/', $class->getDocComment(), $match);
            $resp['auth'] = $match[1];
            preg_match('/time\((.*)\)/', $class->getDocComment(), $match);
            $resp['time'] = $match[1];
            preg_match('/active\((.*)\)/', $class->getDocComment(), $match);
            $resp['active'] = $match[1];
        } catch (\Exception $exc) {
            
        }
        return $resp;
    }

    /**
     * change active
     * @param Site $site
     * @return Response
     */
    public static function active(Site $site) {
        self::$root = \Yii::getAlias('@common') . '/models/crawl';
        $resp = self::open($site);
        if ($resp == null) {
            return new Response(false, "opent file false");
        }
        if ($resp->success == false) {
            return $resp;
        }
        try {
            $class = new \ReflectionClass('common\\models\\crawl\\' . ucwords(TextUtils::removeMarks($site->domain)));
            preg_match('/active\((.*)\)/', $class->getDocComment(), $match);
            $match = strval($match[1]) == 'true' ? false : true;
            CategoryBusiness::updateRunBySite($site->id, $match);
            //change
            $data = preg_replace('/@activeAuth\((.*)\)/', '@activeAuth(' . \Yii::$app->user->getId() . ')', $resp->data);
            $data = preg_replace('/@activeTime\((.*)\)/', '@activeTime(' . date("H:i:s d/m/Y") . ')', $data);
            $data = preg_replace('/@active\((.*)\)/', '@active(' . ($match == true ? 'true' : 'false') . ')', $data);
            self::save($site, $data);
            return new Response(true, 'active success', $match);
        } catch (\Exception $exc) {
            return new Response(false, $exc->getMessage(), []);
        }
    }

}
