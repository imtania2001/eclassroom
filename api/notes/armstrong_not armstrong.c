/*W.A.P to print check whether a armstrong or not armstrong...*/
#include<stdio.h>
main()
{
	int n,r,t,s=0,i;
	printf("\nenter the no ");
	scanf("%d",&n);
	t=n;
	for(i=1;n>0;i--)
	{
		r=n%10;
		s=s+(r*r*r);
		n=n/10;
	}
	if(t==s)
	printf("\n The no. is armstrong %d",t);
	else
	printf("\n The no. is not armstrong %d ",t);
}
