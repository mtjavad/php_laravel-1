<?php
/**
 * Created by PhpStorm.
 * User: M.Javad
 * Date: 8/18/2019
 * Time: 10:26 PM
 */

namespace App;


class test
{
private $name;
private $fname;

    public function setName($name)
    {
        $this->name=$name;
        return $this;
}
    public function setFname($fname)
    {
        $this->fname=$fname;
        return $this;
    }
    public function toString()
    {
        return $this->name . ' ' . $this->fname;
}
}
$person=new test();
$person->setFname('ahmadii')->setName('ahmad');
//$person->setFname('ahmadii');
echo $person->toString();