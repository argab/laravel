
export class Matrix
{
    constructor(params = {})
    {
        this.param = {
            matrix_width:  10,
            matrix_height: 10
        };

        this.matrix = {};

        this.count = {};

        this.stack = [];

        this.stackFilter = {};

        this.param = Object.assign(this.param, params)
    }

    static setItem()
    {
        let item = Math.random();

        return (item < 0.5) ? Math.floor(item) : Math.ceil(item);
    }

    setMatrix()
    {
        for (let i = 0; i < this.param.matrix_height; i++)
        {
            this.matrix[i] = [];

            for (let ii = 0; ii < this.param.matrix_width; ii++)
            {
                this.matrix[i].push(Matrix.setItem())
            }
        }

        // this.matrix = JSON.parse('{"0":[1,1,0,0,1,1,0,0,0,0],"1":[1,0,0,1,0,1,1,1,0,0],"2":[1,1,1,0,1,0,0,1,0,1],"3":[1,0,0,1,0,0,1,1,0,0],"4":[0,0,1,1,1,0,0,0,0,1],"5":[1,0,1,1,0,0,0,0,1,1],"6":[0,1,0,0,1,1,0,0,0,0],"7":[1,1,0,1,0,1,0,0,0,1],"8":[0,1,1,0,0,1,0,1,0,0],"9":[1,1,0,1,1,1,0,1,0,1]}');

        return this;
    }

    addStack(posX, posY)
    {
        try
        {
            if ( ! (('' + posX + posY) in this.stackFilter))
            {
                if ((posX-1 >=0 && this.matrix[posX-1][posY] === 1)

                    || (posX+1 < this.param.matrix_height && this.matrix[posX+1][posY] === 1))
                {
                    this.stack.push([posX, posY]);

                    this.stackFilter['' + posX + posY] = 1;
                }
            }
        }
        catch(exception)
        {
            console.log('out of stack.');
        }
    }

    countItemsY(posX, posY)
    {
        let goXY = 1;
        let goXy = 1;
        let dcy = 0;

        for (let y = posY; y < this.param.matrix_width*2; ++y)
        {
            if (goXY && y < this.param.matrix_width && this.matrix[posX][y] === 1)
            {
                this.count[posX + '-' + y] = 1;

                this.addStack(posX, y)
            }

            else goXY = 0;

            if (goXy && posY-dcy >= 0 && this.matrix[posX][posY-dcy] === 1)
            {
                this.count[posX + '-' + (posY-dcy)] = 1;

                this.addStack(posX, posY-dcy)
            }

            else goXy = 0;

            dcy += 1;
        }
    }

    countItems(posX, posY)
    {
        let goXx = 1;
        let goXX = 1;
        let dcx = 0;

        for (let x = posX; x < this.param.matrix_height*2; ++x)
        {
            // debugger;

            if (goXX && x < this.param.matrix_height && this.matrix[x][posY] === 1)
            {
                this.count[x + '-' + posY] = 1;

                this.countItemsY(x, posY)
            }

            else goXX = 0;

            if (goXx && posX-dcx >= 0)
            {
                if (this.matrix[posX - dcx][posY] === 1)
                {
                    this.count[(posX - dcx) + '-' + posY] = 1;

                    this.countItemsY(posX - dcx, posY)
                }

                else goXx = 0;
            }

            dcx += 1;
        }
    }

    fetchStack()
    {
        while (this.stack.length>0)
        {
            this.countItems(this.stack[0][0], this.stack[0][1]);

            this.stack.shift();
        }
    }
}
