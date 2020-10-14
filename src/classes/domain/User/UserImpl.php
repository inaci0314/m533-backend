<?php

class UserImpl implements User
{
    #region Properties

    /**
     * $_id.
     *
     * @var int
     */
    private $_id = 0;
    /**
     * $_username.
     *
     * @var string
     */
    private $_username = '';
    /**
     * $_firstName.
     *
     * @var string
     */
    private $_firstName = '';
    /**
     * $_lastName.
     *
     * @var string
     */
    private $_lastName = '';
    /**
     * $_type.
     *
     * @var int
     */
    private $_type = 0;

    #endregion

    public function __construct(
        int $id,
        string $username,
        string $firstName,
        string $lastName,
        int $type
    ) {
        $this->setId($id);
        $this->setUsername($username);
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
        $this->setType($type);
    }

    #region Accessors

    public function getId(): int
    {
        return $this->_id;
    }

    public function getUsername(): string
    {
        return $this->_username;
    }

    public function getFirstName(): string
    {
        return $this->_firstName;
    }

    public function getLastName(): string
    {
        return $this->_lastName;
    }

    public function getType(): int
    {
        return $this->_type;
    }

    #endregion

    #region Mutators

    public function setId(int $id)
    {
        $this->_id = $id;
    }

    public function setUsername(string $username)
    {
        $this->_username = $username;
    }

    public function setFirstName(string $firstName)
    {
        $this->_firstName = $firstName;
    }

    public function setLastName(string $lastName)
    {
        $this->_lastName = $lastName;
    }

    public function setType(int $type)
    {
        $this->_type = $type;
    }

    #endregion
}
