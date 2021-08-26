<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="categories")
 */
class Category
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @var Job[]|ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Job", mappedBy="category")
     */
    private $jobs;

    /**
     * @var Affiliate[]|ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Affiliate", mappedBy="categories")
     */
    private $affiliates;

    /**
     * Category constructor.
     * @param Job[]|ArrayCollection $jobs
     */

    public function __construct()
    {
        $this->jobs = new ArrayCollection();
        $this->affiliates = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return Job[]|ArrayCollection
     */
    public function getJobs()
    {
        return $this->jobs;
    }

    /**
     * @param Job $job
     */
    public function addJob(Job $job)
    {
        $this->jobs->add($job);
        // uncomment if you want to update other side
        //$job->setCategory($this);
    }

    /**
     * @param Job $job
     */
    public function removeJob(Job $job)
    {
        $this->jobs->removeElement($job);
        // uncomment if you want to update other side
        //$job->setCategory(null);
    }

    /**
     * @param Affiliate $affiliate
     */


    /**
     * @return Affiliate[]|ArrayCollection
     */
    public function getAffiliates()
    {
        return $this->affiliates;
    }

    public function addAffiliate(Affiliate $affiliate)
    {
        $this->affiliates->add($affiliate);
        // uncomment if you want to update other side
        //$affiliate->setCategory($this);
    }

    /**
     * @param Affiliate $affiliate
     */
    public function removeAffiliate(Affiliate $affiliate)
    {
        $this->affiliates->removeElement($affiliate);
        // uncomment if you want to update other side
        //$affiliate->setCategory(null);
    }




}