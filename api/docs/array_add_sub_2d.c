#include<stdio.h>
main()
{
	int arr[2][3],brr[2][3],crr[2][3],drr[2][3];
	int max,min,r,c;
	printf("take the value of 1st array elements ");
	for(r=0;r<2;r++)
	{
		for(c=0;c<3;c++)
		{
		    printf("\ngive no for row[%d] col[%d]- ",(r+1),(c+1));
			scanf("%d",&arr[r][c]);
	    }
	}
	printf("\ntake the value of 2nd array elements \n");
	for(r=0;r<2;r++)
	{
		for(c=0;c<3;c++)
		{
		    printf("\ngive no for row[%d] col[%d]- ",(r+1),(c+1));
			scanf("%d",&brr[r][c]);
	    }
	}
	printf("\nthe created 1st array is here under\n");
	for(r=0;r<2;r++)
	{
		for(c=0;c<3;c++)
		{
			printf("%d\t",arr[r][c]);
	    }
	    printf("\n");
	}
	printf("\nthe created 2nd array is here under\n");
	for(r=0;r<2;r++)
	{
		for(c=0;c<3;c++)
		{
			printf("%d\t",brr[r][c]);
	    }
	    printf("\n");
	}
		
		
		for(r=0;r<2;r++)
	{
		for(c=0;c<3;c++)
		{
			crr[r][c]=(arr[r][c]+brr[r][c]);
			drr[r][c]=(arr[r][c]-brr[r][c]);
	    }
	}
	
	printf("\nthe addition array is here under\n");
	for(r=0;r<2;r++)
	{
		for(c=0;c<3;c++)
		{
			printf("%d\t",crr[r][c]);
	    }
	    printf("\n");
	}
		printf("\nthe substraction array is here under\n");
	for(r=0;r<2;r++)
	{
		for(c=0;c<3;c++)
		{
			printf("%d\t",drr[r][c]);
	    }
	    printf("\n");
	}				
}
