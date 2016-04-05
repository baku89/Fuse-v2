import Config from '../../config.js'
import CASystem from '../ca-system.js'

class FuseSystem extends CASystem {

	constructor() {
		super()

		this.brushData = {
			blnk: {name: 'Eraser', color: '#61686E', index: 	0,	size: Config.PC ? 5.0 : 5.0},
			wall: {name: 'Wall',   color: '#272e38', index:  32,	size: Config.PC ? 3.0 : 3.0},
			fuse: {name: 'Fuse',   color: '#d5d7bf', index:  64,	size: Config.PC ? 1.5 : 3.0},
			bomb: {name: 'Bomb',   color: '#dad95c', index:  96,	size: Config.PC ? 1.5 : 3.0},
			fire: {name: 'Fire',   color: '#f52661', index: 128,	size: Config.PC ? 1.5 : 2.0},
			xpld: {index: 160}

		}

		console.log(this.brushData)

		this.paletteOrder = ['fuse', 'bomb', 'fire', 'wall', 'blnk']

		this.caShader = require('./fuse-ca.frag')
		this.filterShader = require('./fuse-filter.frag')

	}
}

export default new FuseSystem()