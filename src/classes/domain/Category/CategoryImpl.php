<?php

#region Required classes
require __DIR__ . '/Category.php';
#endregion

class CategoryImpl implements Category
{
    #region Properties

    /**
     * $_id
     *
     * @var integer
     */
    private $_id = 0;

    /**
     * $_name
     *
     * @var string
     */
    private $_name = "";

    #endregion

    /**
     * __construct
     *
     * @param integer $id
     * @param string $name
     */
    public function __construct(int $id, string $name)
    {
        $this->setId($id);
        $this->setName($name);
    }

    #region Accessors

    /**
     *
     * @return integer
     */
    public function getId(): int
    {
        return $this->_id;
    }

    /**
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->_name;
    }

    #endregion

    #region Mutators

    /**
     *
     * @param integer $id
     * @return void
     */
    public function setId(int $id)
    {
        $this->_id = $id;
    }

    /**
     *
     * @param string $name
     * @return void
     */
    public function setName(string $name)
    {
        $this->_name = $name;
    }

    #endregion
}
