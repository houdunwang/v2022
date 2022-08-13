import {
  ValidationArguments,
  ValidatorConstraint,
  ValidatorConstraintInterface,
} from 'class-validator';

@ValidatorConstraint()
export class IsConfirmed implements ValidatorConstraintInterface {
  async validate(value: string, args: ValidationArguments) {
    return value === args.object[args.property + '_confirmed'];
  }

  defaultMessage(args: ValidationArguments) {
    return '比对失败';
  }
}
