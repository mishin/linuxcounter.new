<?php

namespace Syw\Front\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StatsLoadtime
 *
 * @ORM\Table(name="stats_loadtime")
 * @ORM\Entity
 */
class StatsLoadtime
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time", type="datetime", nullable=false)
     */
    private $time;

    /**
     * @var string
     *
     * @ORM\Column(name="domainLookupEnd", type="decimal", precision=10, scale=5, nullable=false)
     */
    private $domainlookupend;

    /**
     * @var string
     *
     * @ORM\Column(name="requestStart", type="decimal", precision=10, scale=5, nullable=false)
     */
    private $requeststart;

    /**
     * @var string
     *
     * @ORM\Column(name="responseStart", type="decimal", precision=10, scale=5, nullable=false)
     */
    private $responsestart;

    /**
     * @var string
     *
     * @ORM\Column(name="responseEnd", type="decimal", precision=10, scale=5, nullable=false)
     */
    private $responseend;

    /**
     * @var string
     *
     * @ORM\Column(name="domComplete", type="decimal", precision=10, scale=5, nullable=false)
     */
    private $domcomplete;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=128, nullable=false)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="countrycode", type="string", length=3, nullable=false)
     */
    private $countrycode;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=32, nullable=false)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="region", type="string", length=48, nullable=false)
     */
    private $region;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=48, nullable=false)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=16, nullable=true)
     */
    private $ip;

    /**
     * @var string
     *
     * @ORM\Column(name="browser", type="string", length=128, nullable=true)
     */
    private $browser;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set time
     *
     * @param \DateTime $time
     * @return StatsLoadtime
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return \DateTime 
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set domainlookupend
     *
     * @param string $domainlookupend
     * @return StatsLoadtime
     */
    public function setDomainlookupend($domainlookupend)
    {
        $this->domainlookupend = $domainlookupend;

        return $this;
    }

    /**
     * Get domainlookupend
     *
     * @return string 
     */
    public function getDomainlookupend()
    {
        return $this->domainlookupend;
    }

    /**
     * Set requeststart
     *
     * @param string $requeststart
     * @return StatsLoadtime
     */
    public function setRequeststart($requeststart)
    {
        $this->requeststart = $requeststart;

        return $this;
    }

    /**
     * Get requeststart
     *
     * @return string 
     */
    public function getRequeststart()
    {
        return $this->requeststart;
    }

    /**
     * Set responsestart
     *
     * @param string $responsestart
     * @return StatsLoadtime
     */
    public function setResponsestart($responsestart)
    {
        $this->responsestart = $responsestart;

        return $this;
    }

    /**
     * Get responsestart
     *
     * @return string 
     */
    public function getResponsestart()
    {
        return $this->responsestart;
    }

    /**
     * Set responseend
     *
     * @param string $responseend
     * @return StatsLoadtime
     */
    public function setResponseend($responseend)
    {
        $this->responseend = $responseend;

        return $this;
    }

    /**
     * Get responseend
     *
     * @return string 
     */
    public function getResponseend()
    {
        return $this->responseend;
    }

    /**
     * Set domcomplete
     *
     * @param string $domcomplete
     * @return StatsLoadtime
     */
    public function setDomcomplete($domcomplete)
    {
        $this->domcomplete = $domcomplete;

        return $this;
    }

    /**
     * Get domcomplete
     *
     * @return string 
     */
    public function getDomcomplete()
    {
        return $this->domcomplete;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return StatsLoadtime
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set countrycode
     *
     * @param string $countrycode
     * @return StatsLoadtime
     */
    public function setCountrycode($countrycode)
    {
        $this->countrycode = $countrycode;

        return $this;
    }

    /**
     * Get countrycode
     *
     * @return string 
     */
    public function getCountrycode()
    {
        return $this->countrycode;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return StatsLoadtime
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set region
     *
     * @param string $region
     * @return StatsLoadtime
     */
    public function setRegion($region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return string 
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return StatsLoadtime
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set ip
     *
     * @param string $ip
     * @return StatsLoadtime
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set browser
     *
     * @param string $browser
     * @return StatsLoadtime
     */
    public function setBrowser($browser)
    {
        $this->browser = $browser;

        return $this;
    }

    /**
     * Get browser
     *
     * @return string 
     */
    public function getBrowser()
    {
        return $this->browser;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
