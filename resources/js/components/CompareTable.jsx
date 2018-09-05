import React, { Component } from 'react';
import PropTypes from 'prop-types';
import classNames from 'classnames';

const CompareTable = ({ cities }) => (
    <table className="table table-hover">
        <thead className="thead-light">
            <tr>
                <th>#</th>
                <th>index</th>
                <th>city</th>
                <th>weather</th>
                <th>temperature</th>
            </tr>
        </thead>
        <tbody>
            {
                cities.map((city, key) =>
                    <tr key={city.id} className={ classNames({ "table-success": key === 0 }) }>
                        <td>{ key + 1 }</td>
                        <td>{ city.index }</td>
                        <td>{ city.city }</td>
                        <td>{ city.weather }</td>
                        <td>{ city.temperature.toFixed(2) } C</td>
                    </tr>
                )
            }
        </tbody>
    </table>
);

CompareTable.propTypes = {
    cities: PropTypes.arrayOf(PropTypes.object).isRequired,
};

export default CompareTable;
