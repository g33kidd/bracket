import { camelizeKeys } from 'humps'
import 'isomorphic-fetch'

const API_ROOT = "https://bracket.dev/api/"

function callApi(endpoint, schema) {
	const fullUrl = (endpoint.indexOf(API_ROOT) === -1) ? API_ROOT + endpoint : endpoint;

	return fetch(fullUrl)
		.then(response =>
			response.json().then(json => ({ json, response })))
		.then(({ json, response }) => {
			if(!response.ok) {
				return Promise.reject(json)
			}

			const camelizedJson = camelizeKeys(json)
			
		})
}