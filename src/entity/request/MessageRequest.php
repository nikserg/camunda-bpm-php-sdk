<?php


namespace org\camunda\php\sdk\entity\request;

class MessageRequest extends Request
{
    /**
     * @var string
     */
    protected $messageName;
    /**
     * @var string
     */
    protected $businessKey;
    /**
     * @var VariableRequest[] map [variableName:valueDeclaration] that should match for message to correlate
     */
    protected $correlationKeys;
    /**
     * @var VariableRequest[] map [variableName:valueDeclaration] to be set
     */
    protected $processVariables;
    /**
     * @var string process instance uuid
     */
    protected $processInstanceId;
    /**
     * @var bool if true, correlates to every matching listener, else to all
     */
    protected $all;
    /**
     * @var bool respond with correlation result
     */
    protected $resultEnabled;

    /**
     * @param string $messageName
     * @return MessageRequest
     */
    public function setMessageName(string $messageName): MessageRequest
    {
        $this->messageName = $messageName;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessageName(): string
    {
        return $this->messageName;
    }

    /**
     * @param string $businessKey
     * @return MessageRequest
     */
    public function setBusinessKey(string $businessKey): MessageRequest
    {
        $this->businessKey = $businessKey;
        return $this;
    }

    /**
     * @return string
     */
    public function getBusinessKey(): string
    {
        return $this->businessKey;
    }

    /**
     * @param array $correlationKeys
     * @return MessageRequest
     */
    public function setCorrelationKeys(array $correlationKeys): MessageRequest
    {
        $this->correlationKeys = $correlationKeys;
        return $this;
    }

    /**
     * @return array
     */
    public function getCorrelationKeys(): array
    {
        return $this->correlationKeys;
    }

    /**
     * @param array $processVariables
     * @return MessageRequest
     */
    public function setProcessVariables(array $processVariables): MessageRequest
    {
        $this->processVariables = $processVariables;
        return $this;
    }

    /**
     * @return array
     */
    public function getProcessVariables(): array
    {
        return $this->processVariables;
    }

    /**
     * @param string $processInstanceId
     * @return MessageRequest
     */
    public function setProcessInstanceId(string $processInstanceId): MessageRequest
    {
        $this->processInstanceId = $processInstanceId;
        return $this;
    }

    /**
     * @return string
     */
    public function getProcessInstanceId(): string
    {
        return $this->processInstanceId;
    }

    /**
     * @param bool $all
     * @return MessageRequest
     */
    public function setAll(bool $all): MessageRequest
    {
        $this->all = $all;
        return $this;
    }

    /**
     * @return bool
     */
    public function isAll(): bool
    {
        return $this->all;
    }

    /**
     * @param bool $resultEnabled
     * @return MessageRequest
     */
    public function setResultEnabled(bool $resultEnabled): MessageRequest
    {
        $this->resultEnabled = $resultEnabled;
        return $this;
    }

    /**
     * @return bool
     */
    public function isResultEnabled(): bool
    {
        return $this->resultEnabled;
    }
}