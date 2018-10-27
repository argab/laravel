class Matrix
{
    constructor(params = {})
    {
        this.param = {
            matrix_width:  10,
            matrix_height: 10
        };

        this.matrix = {};

        this.count = {};

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

        return this;
    }

    countItems(posX, posY)
    {
        //https://www.geeksforgeeks.org/find-number-of-islands/

        let goXx = 1;
        let goXX = 1;
        let dcx = 1;

        for (let x = posX; x < this.param.matrix_height; ++x)
        {
            // debugger;

            if (x-dcx >= 0 && goXx)
            {
                if (this.matrix[x - dcx][posY] === 1)

                    this.count[(x - dcx) + '-' + posY] = 1;

                else goXx = 0;

                if ()
            }

            dcx += 1;

            if (this.matrix[x][posY] === 1 && goXX)
            {
                if (this.matrix[x][posY] === 1)

                    this.count[x + '-' + posY] = 1;

                else goXX = 0;
            }

            // for (let y = posY; y < this.param.matrix_width; ++y)
            // {


                // if (goXY === 1)
                // {
                //     if (this.matrix[x][y] === 1)
                //
                //         this.count[x + '-' + y] = 1;
                //
                //     else goXY = 0;
                //
                //     if (x-dcx >= 0 && this.matrix[x-dcx][y] === 1)
                //     {
                //         this.count[(x-dcx) + '-' + y] = 1;
                //     }
                // }
                //
                // if (posY-dcy >= 0 && goXy === 1)
                // {
                //     if (this.matrix[x][posY-dcy] === 1)
                //
                //         this.count[x + '-' + (posY-dcy)] = 1;
                //
                //     else goXy = 0;
                //
                //     if (x-dcx >= 0 && this.matrix[x-dcx][posY-dcy] === 1)
                //     {
                //         this.count[(x-dcx) + '-' + (posY-dcy)] = 1;
                //     }
                // }

                // dcy += 1;
                // dcx += 1;
            // }

            // if (this.matrix[x][posY] === 0)
            //
            //     break;
        }

        return this.count;
    }

}
