<?php
declare(strict_types=1);

namespace Phalcon\Mvc\Model\Query;

use Phalcon\Mvc\Model\QueryInterface;

/**
 * Phalcon\Mvc\Model\Query\BuilderInterface
 *
 * Interface for Phalcon\Mvc\Model\Query\Builder
 */
interface BuilderInterface {
    public const OPERATOR_OR  = 'or';
    public const OPERATOR_AND = 'and';

    /**
     * Sets the columns to be queried
     *
     * @param string|array $columns
     * @return self
     */
    public function columns($columns): BuilderInterface;

    /**
     * Return the columns to be queried
     *
     * @return string|array
     */
    public function getColumns();

    /**
     * Sets the models who makes part of the query
     *
     * @param string|array $models
     * @return self
     */
    public function from($models): BuilderInterface;

    /**
     * Add a model to take part of the query
     *
     * @param string $model
     * @param string $alias
     * @return BuilderInterface
     */
    public function addFrom($model, $alias = null): BuilderInterface;

    /**
     * Return the models who makes part of the query
     *
     * @return string|array
     */
    public function getFrom();

    /**
     * Adds an :type: join (by default type - INNER) to the query
     *
     * @param string $model
     * @param string $conditions
     * @param string $alias
     * @param string $type
     * @return BuilderInterface
     */
    public function join($model, $conditions = null, $alias = null, $type = null): BuilderInterface;

    /**
     * Adds an INNER join to the query
     *
     * @param string $model
     * @param string $conditions
     * @param string $alias
     * @return Builder
     */
    public function innerJoin($model, $conditions = null, $alias = null): Builder;

    /**
     * Adds a LEFT join to the query
     *
     * @param string $model
     * @param string $conditions
     * @param string $alias
     * @return Builder
     */
    public function leftJoin($model, $conditions = null, $alias = null): Builder;

    /**
     * Adds a RIGHT join to the query
     *
     * @param string $model
     * @param string $conditions
     * @param string $alias
     * @return Builder
     */
    public function rightJoin($model, $conditions = null, $alias = null): Builder;

    /**
     * Return join parts of the query
     *
     * @return array
     */
    public function getJoins(): array;

    /**
     * Sets conditions for the query
     *
     * @param string $conditions
     * @param array  $bindParams
     * @param array  $bindTypes
     * @return BuilderInterface
     */
    public function where($conditions, $bindParams = null, $bindTypes = null): BuilderInterface;

    /**
     * Appends a condition to the current conditions using a AND operator
     *
     * @param string $conditions
     * @param array  $bindParams
     * @param array  $bindTypes
     * @return Builder
     */
    public function andWhere($conditions, $bindParams = null, $bindTypes = null): Builder;

    /**
     * Appends a condition to the current conditions using an OR operator
     *
     * @param string $conditions
     * @param array  $bindParams
     * @param array  $bindTypes
     * @return Builder
     */
    public function orWhere($conditions, $bindParams = null, $bindTypes = null): Builder;

    /**
     * Appends a BETWEEN condition to the current conditions
     *
     * @param string $expr
     * @param mixed  $minimum
     * @param mixed  $maximum
     * @param string $operator
     * @return Builder
     */
    public function betweenWhere($expr, $minimum, $maximum, $operator = BuilderInterface::OPERATOR_AND): Builder;

    /**
     * Appends a NOT BETWEEN condition to the current conditions
     *
     * @param string $expr
     * @param mixed  $minimum
     * @param mixed  $maximum
     * @param string $operator
     * @return Builder
     */
    public function notBetweenWhere($expr, $minimum, $maximum, $operator = BuilderInterface::OPERATOR_AND): Builder;

    /**
     * Appends an IN condition to the current conditions
     *
     * @param string $expr
     * @param array  $values
     * @param string $operator
     * @return BuilderInterface
     */
    public function inWhere($expr, array $values, $operator = BuilderInterface::OPERATOR_AND): BuilderInterface;

    /**
     * Appends a NOT IN condition to the current conditions
     *
     * @param string $expr
     * @param array  $values
     * @param string $operator
     * @return BuilderInterface
     */
    public function notInWhere($expr, array $values, $operator = BuilderInterface::OPERATOR_AND): BuilderInterface;

    /**
     * Return the conditions for the query
     *
     * @return string|array
     */
    public function getWhere();

    /**
     * Sets an ORDER BY condition clause
     *
     * @param string $orderBy
     * @return BuilderInterface
     */
    public function orderBy($orderBy): BuilderInterface;

    /**
     * Return the set ORDER BY clause
     *
     * @return string|array
     */
    public function getOrderBy();

    /**
     * Sets a HAVING condition clause
     *
     * @param string $having
     * @return BuilderInterface
     */
    public function having($having): BuilderInterface;

    /**
     * Returns the HAVING condition clause
     *
     * @return string|array
     */
    public function getHaving();

    /**
     * Sets a LIMIT clause
     *
     * @param int $limit
     * @param int $offset
     * @return BuilderInterface
     */
    public function limit($limit, $offset = null): BuilderInterface;

    /**
     * Returns the current LIMIT clause
     *
     * @return string|array
     */
    public function getLimit();

    /**
     * Sets a LIMIT clause
     *
     * @param string|array $group
     * @return BuilderInterface
     */
    public function groupBy($group): BuilderInterface;

    /**
     * Returns the GROUP BY clause
     *
     * @return string
     */
    public function getGroupBy(): string;

    /**
     * Returns a PHQL statement built based on the builder parameters
     *
     * @return string
     */
    public function getPhql(): string;

    /**
     * Returns the query built
     *
     * @return QueryInterface
     */
    public function getQuery(): QueryInterface;

}
